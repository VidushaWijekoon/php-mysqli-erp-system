<?php
ob_start();
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';
require_once "phpqrcode/qrlib.php";
require_once "sanitizer.php";
?>
<?php
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];
$user_id = $_SESSION['username'];
$pallet_id=0;

$query ="SELECT `pallet_id` FROM `pallets` ORDER BY pallet_id DESC LIMIT 1";
$query_run = mysqli_query($connection, $query);
foreach ($query_run as $data) {
    $pallet_id = $data['pallet_id'];
}
$start_print=0;
if ( $pallet_id ==0) {
    $pallet_id++;
    $sql="INSERT INTO `pallets`(`pallet_id`, `user_name`, `department`, `role_id`) VALUES ('1','$user_id','$department','$role_id')";
    $query1 = mysqli_query($connection, $sql);
    $tempDir = 'palet_qr/';
    $filename = $pallet_id;
    $codeContents = $pallet_id;
    QRcode::png($codeContents, $tempDir . '' . $filename . '.png', QR_ECLEVEL_L, 5, 1);
    $start_print = 1;
}
?>
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2 d-none">
            <div class="card mt-3 w-100">
                <div class="card-body ">
                    <input type="button" onclick="printDiv('printableArea')" value="print a QR!" />
                    <?php if ($start_print == 1 || $id != 0) {?>
                    <div id="printableArea">
                        <?php } else {?>
                        <div>
                            <?php }
if ($start_print == 1 ) {
    $last_id=$pallet_id;;
    $howManyCodes = 1;
    $start = $last_id;
    $digits = 6;
    $codeArray = (filterRaw('codeArray') != "") ? filterRaw('codeArray') : "";
    function write($code, $last_id)
    {
        ?>
                            <table>
                                <tr>
                                    <th style="width :400px">
                                        <div style="display:flex">
                                            <?php echo '<img src="palet_qr/'.$last_id.'.png" style="width:350px; height:350px;margin: 0px 0 0 25px;">';?>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                            <?php
}
    echo "<div class='sheet'>";
    if ($codeArray != "") { // Specified array of codes
        foreach (json_decode($codeArray) as $secondPart) {
            write($code, $last_id);
        }
    } else { // Unspecified codes, let's go incremental
        for ($i = $start; $i < $howManyCodes + $start; $i++) {
            $code = str_pad($i, $digits, "0", STR_PAD_LEFT);
            write($code, $last_id);
        }
    }
    echo "</div>";

}
?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </body>

    <script>
    $(document).ready(function() {
        $('#example1').dataTable();
    });
    </script>
    <script>
    var int = setInterval('check()', 300);
    function check() {
        if (chobj('div') == true) {
            printDiv('printableArea')
            // window.alert('true');
            int = window.clearInterval(int);
        } else {
            // document.write('<p>false</p>');
        }
    }
    function chobj(printableArea) {
        return (document.getElementById('printableArea')) ? true : false;
    }
    document.getElementById("printableArea").innerHTML = x;

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        window.location.href = './warehouse_dashboard.php';
    }
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
    option {
        background: #343a40 !important;
    }

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
    <script>
    $(document).ready(function() {
        $('#example1').dataTable();
    });

    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

    })

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
        height: 28px;
        margin: inherit;
        margin-top: 4px;
        font-size: 16px;
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
        font-size: 16px;
    }

    .col-form-label {
        font-size: 14px !important;
    }

    .select2-selection {
        background: #343a40 !important;

    }

    .select2-selection__rendered {
        color: white !important;
        font-size: 18px;
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


    <?php include_once '../includes/footer.php';?>