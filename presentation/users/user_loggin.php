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

$userid = $_GET["user_id"];
$username = $_GET["username"];

if($role_id = 1 && $department == 11) {
    
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./users_dashboard.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">

                <div class="card-header d-flex bg-secondary">
                    <div class="mr-auto">
                        <div class="text-center mx-auto mt-1 text-uppercase" style="font-size: 14px;">
                            <?php echo $username . " - " . $userid; ?>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Logged Time</th>
                                <th>Looged Out Time</th>
                                <th>Logged in Minutes</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                $query = "SELECT * FROM users_logged_in_time WHERE username = '$username'";
                                $users = mysqli_query($connection, $query);

                                if(mysqli_num_rows($users) > 0){
                                    foreach($users as $u){
                                        $logged_out = $u['logged_out'];
                                        $logged_in = $u['logged_time'];
                            
                            ?>

                            <tr>
                                <td>#</td>
                                <td><?= $u['logged_time'] ?></td>
                                <td><?= $u['logged_out'] ?></td>
                                <td>
                                    <?php if( $u['logged_out'] == '0000-00-00 00:00:00') {?>
                                    <span class="badge badge-lg badge-success text-white">Still Looged in</span>
                                    <?php } elseif( $u['logged_out'] != '0000-00-00 00:00:00') {?>
                                    <span class="badge badge-lg badge-primary text-white">
                                        <?php $working_time_in_seconds = strtotime($u['logged_out']) - strtotime($u['logged_time']);
                                                       echo date('H:i:s', $working_time_in_seconds ); 
                                                    ?>
                                    </span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>