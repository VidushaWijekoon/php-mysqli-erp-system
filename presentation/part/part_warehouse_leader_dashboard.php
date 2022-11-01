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

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

if($role_id = 1 && $department == 11 || $role_id == 4 && $department ==22) {
    
?>

<div class="row page-titles m-2">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i> Part warehouse
            Dashboard </h3>
    </div>
</div>
<?php 
$query ="SELECT COUNT(1) AS entries, DATE(`created_date`) as date
            FROM requested_part_from_production
            WHERE status =1
            GROUP BY DATE(created_date) ORDER BY DATE(created_date);";
$query_run = mysqli_query($connection, $query);
$day;
?>
<div class="container-fluid d-flex w-75 ">
    <div class="col-lg-4 col-md-6 col-sm-12 d-flex">
        <div class="row d-flex">
            <?php
            $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
            $date = $date1->format('Y-m-d');
                foreach($query_run as $a){
                $day = $a['date'];
                $timestamp = strtotime($day);
                $day = date('D', $timestamp);
                // echo $a['date'];
                $date2=date_create($a['date']);
                $date1=date_create($date);
                $diff=date_diff($date1,$date2);
                $date_diff = $diff->format("%a ");
                if($date_diff <7){
                    ?>
            <a href="part_warehouse_task_view.php?date=<?php echo $a['date']?>">
                <div class="card">
                    <div class="card-header bg-info" style="color:black !important">
                        <?php echo $day ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">You have <?php echo $a['entries']; ?> parts request</h5>
                    </div>
                </div>
            </a>
            <?php
                } elseif($date_diff >7 && $date_diff <14) { 
                ?>
            <a href="part_warehouse_task_view.php?date=<?php echo $a['date']?>">
                <div class="card">
                    <div class="card-header bg-warning " style="color:black !important">
                        <?php echo $day ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">You have <?php echo $a['entries']; ?> parts request</h5>
                    </div>
                </div>
            </a>
            <?php
                }else{
                    ?>
            <a href="part_warehouse_task_view.php?date=<?php echo $a['date']?>">
                <div class="card">
                    <div class="card-header bg-danger " style="color:white !important">
                        <?php echo $day ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">You have <?php echo $a['entries']; ?> parts request</h5>
                    </div>
                </div>
            </a>
            <?php
                }
                }
            ?>
        </div>
    </div>
</div>


<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>