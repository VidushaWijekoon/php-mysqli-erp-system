<?php
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

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center mt-2"><a href="./battery_performance.php">
            <i class="fa-solid fa-left fa-4x " style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div class="col col-lg-12 justify-content-center m-auto text-uppercase float-left">
    <div class="row ">

        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto ">
            <table id="tblexportData" class="table table-striped">
                <thead>
                    <th>Model</th>
                    <th>Completed QTY </th>
                </thead>
                <tbody>
                    <?php
                    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                    $date = $date1->format('Y-m-d 00:00:00');
                    $date2 = $date1->format('Y-m-d 23:59:59');
                    $query = "SELECT model,COUNT(bat_id)as count FROM battery_request WHERE status='1' AND completed_date between '$date' AND '$date2'";
                    $sql = mysqli_query($connection, $query);
                    foreach ($sql as $a) {

                    ?>
                        <tr>
                            <td><?php echo $a['model'] ?></td>
                            <td><?php echo $a['count'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- //////////////////////////////////////////////////////// -->