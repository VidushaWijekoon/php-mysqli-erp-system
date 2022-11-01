<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Taviraj:ital,wght@0,300;1,400&display=swap"
    rel="stylesheet">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<style>
body {
    font-family: 'Bree Serif', serif;
}

span {
    font-size: 8px;
    text-transform: uppercase;
}
</style>

<?php 

session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/403.php');

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

if($role_id == 1 && $department == 11 || $role_id == 4 && $department == 2 || $role_id == 2 && $department == 18){
 
 
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
 

$query = "SELECT * FROM warehouse_information_sheet ORDER BY inventory_id DESC LIMIT 1";
$query_run = mysqli_query($connection, $query);

if (mysqli_fetch_array($query_run) > 0) {
    foreach ($query_run as $qr_print) {
 
?>

<body>

    <!-- <div class="mb-3 " style="max-width: 384px;" id="printableArea"> -->
    <div class="mb-3 mx-auto " style="max-width: 384px;" id="printableArea">
        <div class="row g-0 p-0 m-0">
            <span class="d-flex" style="font-size: 16px;">
                <?php echo $qr_print['brand']; ?>
                <?php echo $qr_print['model']; ?>
                <?php echo $qr_print['core']; ?>
            </span>
        </div>

        <div class="row d-flex  " id="qrcodeCanvas">
            <div class="col-md-4">
                <img style="width:40%" src=" <?php echo $qr_print['qr_image'] ?> ">
            </div>

            <div class="col-md-8">
                <div class="card-body" style="margin-top: -4px; font-size: 16px; ">
                    <!-- <span class="card-text d-block" style="margin-top: -120px; font-size: 16px; margin-left: 260px;"> -->
                    <?php echo $qr_print['location']; echo"</br>";?>
                    <?php echo $qr_print['model']; ?>
                    <?php echo $qr_print['generation']; ?>
                    <p class="card-text mt-1">
                        <span style="font-size: 16px;"
                            class="text-uppercase"><?php echo 'ALSAKB' . $qr_print['inventory_id'] . ''; ?></span>
                    </p>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <?php 

   }
}
?>

    <div>
        <div></div>
    </div>
    <script>
    function printDiv(divName) {

        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();

        document.body.innerHTML = originalContents;
    }
    </script>
    <script>
    // w=window.open();
    // w.document.write("<p>This is 'myWindow'</p>");
    // w.print();
    // w.close();
    </script>

    <input type="submit" id='prnBtn' onclick="printDiv('printableArea')" value="print a qr!" />


</body>

</html>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>