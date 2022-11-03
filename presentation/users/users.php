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
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Users</p>
                </div>
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>EPF</th>
                                <th>Username</th>
                                <th>Department</th>
                                <th>Location</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_1">
                            <?php
                            
                                // getting the list of users
                                $query = "SELECT * FROM users 
                                INNER JOIN departments 
                                ON departments.department_id = users.department                            
                                INNER JOIN tbl_roles
                                ON tbl_roles.role_id = users.role";
                                
                                $query_run = mysqli_query($connection, $query);

                                if ($rowcount = mysqli_fetch_assoc($query_run)) {
                                    foreach ($query_run as $users) {
                                        $username = $users['username'];                                 
                                ?>
                            <tr>
                                <td><?php echo $users['epf'] ?></td>
                                <td><?php echo $users['username'] ?></td>
                                <td><?php echo $users['department'] ?></td>
                                <td><?php echo $users['location'] ?></td>
                                <td><?php echo $users['role'] ?></td>
                                <td class="text-center">
                                    <?php if($users['is_deleted'] == 0) { ?>
                                    <span class="badge badge-lg badge-info text-white p-1 px-3">Active</span>
                                    <?php } elseif($users['is_deleted'] == 1) { ?>
                                    <span class="badge badge-lg badge-danger text-white p-1 px-3">In Active</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"users_edit.php?user_id={$users['user_id']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                                    <?php if($users['isActive'] == 0 || $users['is_deleted'] == 0){ 
                                        echo "<a class='btn btn-xs btn-danger mx-1' href=\"inActive_user.php?user_id={$users['user_id']}\" onclick=\"return confirm('Are you sure $username want inactive this user?');\"><i class='fa-solid fa-xmark px-1'></i></a>" ; }
                                    elseif($users['isActive'] == 1 || $users['is_deleted'] == 1){
                                        echo "<a class='btn btn-xs btn-success mx-1' href=\"activate_user.php?user_id={$users['user_id']}\" onclick=\"return confirm('Make sure you want to $username want reactivate this user');\"><i class='fa-solid fa-check' style='padding-right: 2px;''></i></a>" ; }                                    
                                        ?> </td>
                            </tr>
                            <?php 
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $('#example1').dataTable();
});
</script>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>