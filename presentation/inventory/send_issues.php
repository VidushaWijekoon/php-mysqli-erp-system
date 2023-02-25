<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
?> 
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <a href="warehouse_dashboard.php">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div
            class="col-lg-6 grid-margin stretch-card justify-content-center align-item-center mx-auto mt-2 text-uppercase">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Audit</p>
                </div>
                <div class="card-body justify-content-center align-item-center mx-auto mt-2">
                    <form method='POST' action='send_issues_save.php' >
                    <div class="row">
                            <label class="col-sm-3 col-form-label">Scan QR number</label>
                            <div class="col-sm-8 w-75">
                               
                                    <input class="w-50" style="color:black !important" type="number" 
                                        name="qr_number" id="qr_number" placeholder="Scan QR number" onkeypress="return (event.charCode > 47 && event.charCode < 58)" required>
                                    
                            </div>
                    </div>
                    <hr>
                    <div class="row ">
                            <div class=" row col-sm-12 ">
                            <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">Scratch (PGP) </h4>
                                <input type="checkbox" id="scrtch" name="scrtch" value="1">
                            </div>
                            <div class="col-sm-12 row">
                            <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">Spot (ZGP + SGP) </h4>
                                <input type="checkbox" id="spt" name="spt" value="1">

                            </div>
                            <div class="col-sm-12 row">
                            <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">Broken LCD</h4>
                                <input type="checkbox" id="brkn" name="brkn" value="1">

                            </div>
                            <div class="col-sm-12 row">
                            <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">Yellow Shadow LCD </h4>
                                <input type="checkbox" id="ylwsdw" name="ylwsdw" value="1">

                            </div>
                            <div class=" row col-sm-12 ">
                            <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">Bios Lock</h4>
                                <input type="checkbox" id="bios" name="bios" value="1">
                            </div>
                            <div class="col-sm-12 row">
                            <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">Computrace Lock </h4>
                                <input type="checkbox" id="com" name="com" value="1">

                            </div>
                            <div class="col-sm-12 row">
                            <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">me region</h4>
                                <input type="checkbox" id="me" name="me" value="1">

                            </div>
                            <div class="col-sm-12 row">
                            <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">No power </h4>
                                <input type="checkbox" id="power" name="power" value="1">

                            </div>
                            <div class="col-sm-12 row">
                            <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">No display</h4>
                                <input type="checkbox" id="no_display" name="no_display" value="1">

                            </div>
                            <div class=" row col-sm-12 ">
                            <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">Port Issue</h4>
                                <input type="checkbox" id="port" name="port" value="1">
                            </div>
                            <div class="col-sm-12 row">
                            <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">TPM Lock </h4>
                                <input type="checkbox" id="tpm" name="tpm" value="1">

                            </div>
                            <div class="col-sm-12 row">
                            <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">Battery Condition < 55</h4>
                                <input type="checkbox"  onchange="myFunction(this)" id="bat" name="bat" value="1">

                            </div>
                            <div class="col-sm-12 row">
                            <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 " style="display : none"  id="lable">Battery PN </h4>
                                <input type="text" style="display : none"  id="bat_pn" name="bat_pn" >
                            </div>
                        </div>
                        <div class="col-sm-12 row">
                    <button type="submit" name="insert" id="submit"
                                        class="btn mb-2 mt-4 btn-primary btn-sm  mx-auto text-center ">Confirm</button>
</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let searchbar = document.querySelector('input[name="qr_number"]');
searchbar.focus();
search.value = '';
    function myFunction() {
    var checkBox = document.getElementById("bat");
    var text = document.getElementById("bat_pn");
    var lable = document.getElementById("lable");
    if (checkBox.checked == true) {
        text.style.display = "block";
        lable.style.display = "block";
    } else {
        text.style.display = "none";
        lable.style.display = "none";
    }
}
    </script>
<?php include_once '../includes/footer.php';?>