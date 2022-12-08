<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');
require_once("phpqrcode/qrlib.php");
?>
<link rel="stylesheet" href="../../static/plugins/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<script src="../../static/plugins/jquery/1.11.3/jquery.min.js"></script>
<script src="../../static/plugins/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<?php
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];
$user_id = $_SESSION['username'];
    
    $device ="Laptop";
    $brand=0;
    $processor =0;
    $core =0;
    $generation =0;
    $model =0;
    $location =0;
    $inventory_number =0;
    $inventory_id;
    $location_old =null;
if (isset($_POST['search'])) {
    $inventory_id = $_POST['search'];
    $query = "SELECT * FROM `barcodes` LEFt JOIN products ON products.id = barcodes.product_id WHERE text = '$inventory_id';";
    $query1 = mysqli_query($connection, $query);
    $start_print=0;
    $new_id =  substr($inventory_id,6);

    foreach ($query1 as $data) {
        $name = $data['name'];
        $location_old = $data['location'];
        $string = explode(" ",$name);
        $string2 = explode("-",$location_old);
        $device ="Laptop";
        $brand =$string[0];
        if(empty($string[4])){
            $string[4]=null;
        }
        if($string[1]=="i3" ||$string[2] =="i3"||$string[3] =="i3"||$string[4] =="i3"){
            $core ="i3";
        }elseif($string[1]=="i5" ||$string[2] =="i5"||$string[3] =="i5"||$string[4] =="i5"){
            $core ="i5";
        }elseif($string[1]=="i7" ||$string[2] =="i7"||$string[3] =="i7"||$string[4] =="i7"){
            $core ="i7";
        }elseif($string[1]=="i9" ||$string[2] =="i9"||$string[3] =="i9"||$string[4] =="i9"){
            $core ="i9";
        }
        // echo $string[3];
        // echo "</br>";
        // echo $string[1].$string[2].$string[3];
            if($string[2] =="i3"){
               $model= $string[1];
            }elseif($string[3] =="i3"){
                $model= $string[1]." ".$string[2];
            }elseif($string[4] =="i3"){
                $model= $string[1]." ".$string[2]." ".$string[3];
            }
            if($string[2] =="i5"){
                $model= $string[1];
            }elseif($string[3] =="i5"){
                $model= $string[1]." ".$string[2];
            }elseif($string[4] =="i5"){
                $model= $string[1]." ".$string[2]." ".$string[3];
            }
            if($string[2] =="i7"){
                $model= $string[1];
            }elseif($string[3] =="i7"){
                $model= $string[1].$string[2];
            }elseif($string[4] =="i7"){
                $model= $string[1]." ".$string[2]." ".$string[3];
            }
            if($string[2] =="i9"){
                $model= $string[1];
            }elseif($string[3] =="i9"){
                $model= $string[1]." ".$string[2];
            }elseif($string[4] =="i9"){
                $model= $string[1]." ".$string[2]." ".$string[3];
            }
        // $processor =$data['processor'];
        
        $generation =$string2[1];
       
        $location =$location_old;
       
    }

        $location =  $string2[0];
        $inventory_number = 0;
        $sql = strtolower("INSERT INTO warehouse_information_sheet (inventory_id,device, brand, processor, core, generation, model,
        location, send_to_production, create_by_inventory_id, send_time_to_production, sales_order_id) VALUES
        ('$new_id','$device', '$brand', '$processor', '$core', '$generation', '$model', '$location', 0, '$user_id', 0, 0)");
                    $query1 = mysqli_query($connection, $sql);
                    if($generation ==0){
                    echo "<script>
                    var newHTML = document.createElement ('div');
                    newHTML.innerHTML =
                    newHTML = document.createElement ('div');
                    newHTML.innerHTML = ' <div id=\"myModal\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"> <div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
                    document.body.appendChild (newHTML);
                    $(window).load(function(){
                         $('#modal').modal('show');
                    });
                </script>";
        }else{
            echo '<script>alert("Successfully Added")</script>';
        }
                         

}
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center d-flex">
        <a href="./warehouse_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
        <h3 class="mt-2">Update QR Codes</h3>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Update Inventory ID </p>
                </div>
                <div class="card-body">

                    <fieldset class="mt-2 mb-2">
                        <legend>Scan QR</legend>

                        <form action="#" method="POST">
                            <div class="input-group mb-2 mt-2 mx-auto text-center">
                                <input class="w-50" type="text" id="search" name="search" required value="<?php if (isset($_POST['search'])) {
                                                                                        echo $_POST['search'];
                                                                                    } ?>" placeholder="Search QR">
                            </div>

                        </form>
                    </fieldset>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Preview Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div>
                            <?php $query ="SELECT * FROM warehouse_information_sheet WHERE inventory_id ='$new_id'";
                            $result =  mysqli_query($connection, $query); 
                            foreach($result as $data){
                                $device = $data['device'];
                                $model = $data['model'];
                                $brand = $data['brand'];
                                $core = $data['core'];
                                $generation = $data['generation'];
                                
                            }
                            ?>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Device</label>
                                <div class="col-sm-8 w-100">
                                    <input type="text" class="form-control" value="<?php echo $device; ?>" readonly>
                                    <input type="hidden" class="form-control" name="new_id"
                                        value="<?php echo $new_id; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Brand</label>
                                <div class="col-sm-8 w-100">
                                    <input type="text" class="form-control" value="<?php echo $brand; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Model</label>
                                <div class="col-sm-8 w-100">
                                    <input type="text" class="form-control" value="<?php echo $model; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Core</label>
                                <div class="col-sm-8 w-100">
                                    <input type="text" class="form-control" value="<?php echo $core; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Generation</label>
                                <div class="col-sm-8 w-100">
                                    <input type="number" class="form-control" name="generation">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <!-- <button type="button" class="btn bg-gradient-danger" data-dismiss="modal">Close</button> -->
                        <!-- <a class="btn btn bg-gradient-navy" href="./test.php">Update</a> -->
                        <button type="submit" name="submit"
                            class="btn mb-2 mt-4 bg-gradient-primary btn-sm d-block mx-auto text-center">Add Generation
                        </button>

                    </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php 
// if (isset($_POST['submit'])) {
//     $updateid = $_POST["new_id"];
//     $generation = $_POST["generation"];
//     $query = "UPDATE warehouse_information_sheet SET ";
// }
?>
<script>
$(document).ready(function() {
    $('#example1').dataTable();
});
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
[type='date'] {
    height: 22px;
    margin: inherit;
    margin-top: 4px;
    font-size: 10px;
    text-transform: uppercase;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
    color: #ffffff !important;
}

.custom-select {
    font-size: 12px;
}

#exampleFormControlTextarea1 {
    font-size: 12px;
}
</style>

<script>
setTimeout(function() {
    if ($('#msg').length > 0) {
        $('#msg').remove();
    }
}, 10000)

let searchbar = document.querySelector('input[name="search"]');
searchbar.focus();
search.value = '';
</script>




<?php include_once('../includes/footer.php');?>