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

        <div class="col-lg-8 grid-margin stretch-card justify-content-center mx-auto ">
            <div class="card mt-3">
                <div class="card-header" style="font-size:18px">
                    Battery Request Summery
                </div>
                <div class="card-body">
                    <div class="row">
                        <table id="tblexportData" class="table table-striped">
                            <thead>
                                <th>Model</th>
                                <th>Requested QTY</th>
                            </thead>
                            <tbody>
                                <?php
                                $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                $date = $date1->format('Y-m-d 00:00:00');
                                $date2 = $date1->format('Y-m-d 23:59:59');
                                $query = "SELECT COUNT(bat_id) as count, model FROM battery_request WHERE status='0'  GROUP BY model";
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
        </div>

        <div class="col-lg-4  grid-margin stretch-card justify-content-center mx-auto ">
            <div class="card mt-3">
                <div class="card-header" style="font-size:18px">
                    Battery Request Technician
                </div>
                <div class="card-body">
                    <div class="row">
                        <table id="tblexportData" class="table table-striped">
                            <thead>
                                <th>Technician ID</th>
                                <th>QTY</th>
                            </thead>
                            <tbody>
                                <?php
                                $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                $date = $date1->format('Y-m-d 00:00:00');
                                $date2 = $date1->format('Y-m-d 23:59:59');
                                $query = "SELECT COUNT(bat_id) as count, technician_name FROM battery_request WHERE status='0'  GROUP BY technician_name";
                                $sql = mysqli_query($connection, $query);
                                foreach ($sql as $a) {
                                ?>
                                    <tr>
                                        <td><?php echo $a['technician_name'] ?></td>
                                        <td><?php echo $a['count'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto ">
        <table id="tblexportData" class="table table-striped">
            <thead>
                <th>Model</th>
                <th>Battery P/N </th>
                <th>Technician ID</th>
            </thead>
            <tbody>
                <?php
                $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                $date = $date1->format('Y-m-d 00:00:00');
                $date2 = $date1->format('Y-m-d 23:59:59');
                $query = "SELECT model,battery_p_n,technician_name FROM battery_request WHERE status='0'";
                $sql = mysqli_query($connection, $query);
                foreach ($sql as $a) {

                ?>
                    <tr>
                        <td><?php echo $a['model'] ?></td>
                        <td><?php echo $a['battery_p_n'] ?></td>
                        <td><?php echo $a['technician_name'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<!-- //////////////////////////////////////////////////////// -->