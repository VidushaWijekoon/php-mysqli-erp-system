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

if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($role_id == 4 && $department == 20) || ($role_id == 4 && $department == 1)){
    
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
<div class="container-fluid w-75">
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="row">
            <div class="col">
                <?php
            $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
            $date = $date1->format('Y-m-d');
                foreach($query_run as $a){
                    $created_date = $a['date'];
                    $date0=date_create($created_date);
                    date_sub($date0,date_interval_create_from_date_string("7 days"));
                    $past_7_days= date_format($date0,"Y-m-d");
                    $created_date = $a['date'];
                    $date14=date_create($created_date);
                    date_sub($date14,date_interval_create_from_date_string("14 days"));
                    $past_14_days= date_format($date14,"Y-m-d");

                    $query1 ="SELECT COUNT(1) AS entries7
                        FROM requested_part_from_production
                        WHERE status =1 AND created_date ='$past_7_days'
                        GROUP BY DATE(created_date) ORDER BY DATE(created_date);";
                    $query_run1 = mysqli_query($connection, $query1);

                    $query2 ="SELECT COUNT(1) AS entries14 
                        FROM requested_part_from_production
                        WHERE status =1 AND created_date ='$past_14_days'
                        GROUP BY DATE(created_date) ORDER BY DATE(created_date);";
                    $query_run2 = mysqli_query($connection, $query2);
                    $last_7_dayes_entry =0;
                    $last_14_dayes_entry = 0;
                    if(empty($query_run1)){}else{foreach($query_run1 as $b){ $last_7_dayes_entry = $b['entries7'];}}
                    if(empty($query_run2)){}else{foreach($query_run2 as $c){ $last_14_dayes_entry = $c['entries14'];}}
                $day = $a['date'];
                $timestamp = strtotime($day);
                $day = date('D', $timestamp);
                $datedb = $created_date;
                $today = date('l', strtotime($datedb));
                // echo $a['date'];
                $date2=date_create($a['date']);
                $date1=date_create($date);
                $diff=date_diff($date1,$date2);
                $date_diff = $diff->format("%a ");
                if($date_diff <7){
                    $request = $a['entries'] + $last_7_dayes_entry + $last_14_dayes_entry;

                    ?>
                <a href="part_task_list_by_technician.php?date=<?php echo $a['date'] ?>&day=<?php echo $day ?>">
                    <div class="card">
                        <div class="card-header bg-info" style="color:black !important">
                            <?php echo $today ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">You have <?php echo $request; ?> parts request</h5>
                        </div>
                    </div>
                </a>
                <?php } } ?>

            </div>
        </div>
    </div>
</div>


<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>