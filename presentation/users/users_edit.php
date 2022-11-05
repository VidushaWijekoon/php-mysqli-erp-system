<?php
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

$user_id = '';
$location = '';
$epf = '';
$user_id = $_GET['user_id'];

if (isset($_GET['user_id'])) {
    // getting the user information
    $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
    $query = "SELECT * FROM users WHERE user_id = {$user_id} LIMIT 1";
    $result_set = mysqli_query($connection, $query);

    foreach($result_set as $rows){
        $first_name = $rows['first_name'];
        $last_name = $rows['last_name'];
        $epf = $rows['epf'];
        $username = $rows['username'];
        $department = $rows['department'];
        $password = $rows['password'];
        $role = $rows['role'];
    }
}

if (isset($_POST['submit'])) {
    $location = $_POST['location'];

    if (empty($errors)) {
        $query = "UPDATE users SET 'location' = '$location' WHERE user_id = '$user_id'";
        echo $query;
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo '<script>alert("Update Location Successfully")</script>';
        } else {
            $errors[] = 'Failed to modify the record.';
        }
    }
}

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./users.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-5">
            <div class="card mt-5">
                <form action="" method="POST">
                    <fieldset class="mx-3 my-2">
                        <?php if (!empty($errors)) { display_errors($errors); } ?>
                        <legend>Create Warehouse Information Sheet</legend>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-8">
                                <input type="text" <?php echo 'value="' . $first_name . '"'; ?> readonly
                                    class="form-control" name="first_name">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-8">
                                <input type="text" <?php echo 'value="' . $last_name . '"'; ?> readonly
                                    class="form-control" name="last_name">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">EPF</label>
                            <div class="col-sm-8">
                                <input type="text" <?php echo 'value="' . $epf . '"'; ?> readonly class="form-control"
                                    name="epf">
                            </div>
                        </div>


                        <div class="row">
                            <label class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" <?php echo 'value="' . $username . '"'; ?> readonly
                                    class="form-control" name="username">
                            </div>
                        </div>


                        <div class="row">
                            <label class="col-sm-3 col-form-label">Department</label>
                            <div class="col-sm-8">
                                <input type="text" <?php echo 'value="' . $department . '"'; ?> readonly
                                    class="form-control" name="department">
                            </div>
                        </div>


                        <div class="row">
                            <label class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-8">
                                <input type="text" <?php echo 'value="' . $role . '"'; ?> readonly class="form-control"
                                    name="role">
                            </div>
                        </div>

                        <?php 
                            
                            $query1 = "SELECT department, role FROM users WHERE user_id = {$user_id}";
                            $set = mysqli_query($connection, $query1);

                            foreach($set as $x){
                                $department1 = $x['department'];       
                                $role1 = $x['role'];  
                                
                                if($department1 == 1 && $role1 == 6){
                            ?>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Location</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Technician Location"
                                    name="location">
                            </div>
                        </div>

                        <?php } else {
                                
                            } } ?>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <span class="mx-2">******</span> | <a class="text-warning mx-2"
                                    href="user_changepassword.php?user_id=<?php echo $user_id; ?>">Change
                                    Password</a>
                            </div>
                        </div>

                        <?php if($department1 == 1 && $role1 == 6){ ?>
                        <button type="submit" name="submit"
                            class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center"><i
                                class="fa-solid fa-user" style="margin-right: 5px;"></i>Update Location</button>
                        <?php } ?>
                    </fieldset>
                </form>
            </div>
            <!--/col-->
        </div>
    </div>
</div>

</div>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>