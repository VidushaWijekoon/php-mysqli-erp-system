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

if (isset($_POST['submit'])) {
    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
    $date = date("Y-m-d H:i:s");
    $p_n = $_POST['pn_num'];
    $query = "SELECT bat_id FROM battery_request WHERE battery_p_n='$p_n'";
    $sql = mysqli_query($connection, $query);
    foreach ($sql as $ab) {
        $bat_id = $ab['bat_id'];
        $query = "UPDATE battery_request SET received_date='$date',status='2' WHERE bat_id =' $bat_id'";
        $sql = mysqli_query($connection, $query);
    }
}
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center mt-2"><a href="./prod_team_lead.php">
            <i class="fa-solid fa-left fa-4x " style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div class="col col-lg-12 justify-content-center m-auto text-uppercase float-left">
    <div class="row ">
        <div class="col-lg-2 grid-margin stretch-card justify-content-center mx-auto ">
            <div class='card'>
                <div class="card-header" style="font-size:18px">
                    Received Battery
                </div>
                <div class="card-body">
                    <form method='POST'>
                        <input class="w-100" name='pn_num' id='otherInput' type="text" placeholder=" scan P/N Number here" />
                        <button type="submit" name="submit" id="submit" class="btn mb-2 mt-4 btn-primary btn-sm  mx-auto text-center d-none"></button>
                    </form>
                </div>
            </div>
        </div>

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
                                <th>Prepared QTY From Battery Dapartment</th>
                                <th>Received QTY</th>
                                <th>Remaining QTY for Repair</th>
                            </thead>
                            <tbody>
                                <?php
                                $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                // $date = $date1->format('Y-m-d 00:00:00');
                                $date2 = $date1->format('Y-m-d 23:59:59');
                                $date = date("Y-m-d 00:00:00");
                                $query = "SELECT COUNT(bat_id) as count, model FROM battery_request WHERE request_date between '$date'AND '$date2' GROUP BY model";
                                $sql = mysqli_query($connection, $query);
                                foreach ($sql as $a) {
                                ?>
                                    <tr>
                                        <td><?php echo $a['model'] ?></td>
                                        <td><?php echo $a['count'] ?></td>
                                        <?php $model = $a['model'];
                                        $query = "SELECT COUNT(bat_id) as count4 FROM battery_request WHERE request_date between '$date'AND '$date2'AND (status='1') AND model='$model'";
                                        $sql_run1 = mysqli_query($connection, $query);
                                        foreach ($sql_run1 as $al) { ?>
                                            <td><?php echo $al['count4'] ?></td>
                                        <?php }
                                        $query = "SELECT COUNT(bat_id) as count1 FROM battery_request WHERE request_date between '$date'AND '$date2'AND (status='2' ) AND model='$model'";
                                        $sql_run = mysqli_query($connection, $query);
                                        foreach ($sql_run as $b) { ?>
                                            <td><?php echo $b['count1'] ?></td>
                                        <?php }
                                        $query = "SELECT COUNT(bat_id) as count2 FROM battery_request WHERE request_date between '$date'AND '$date2'AND (status='0') AND model='$model'";
                                        $sql_run1 = mysqli_query($connection, $query);
                                        foreach ($sql_run1 as $c) {
                                        ?>
                                            <td><?php echo $c['count2'] ?></td>
                                        <?php } ?>
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
                $query = "SELECT model,battery_p_n,technician_name FROM battery_request WHERE request_date between '$date'AND '$date2'";
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