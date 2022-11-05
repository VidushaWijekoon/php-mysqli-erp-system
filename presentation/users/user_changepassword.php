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
 

$errors = array();
$user_id = '';
$first_name = '';
$last_name = '';
$EPF = '';
$username = '';
$department = '';
$password = '';
$role = '';

if (isset($_GET['user_id'])) {
    // getting the user information
    $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
    $query = "SELECT * FROM users WHERE user_id = {$user_id} LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            // user found
            $result = mysqli_fetch_assoc($result_set);
            $first_name = $result['first_name'];
            $last_name = $result['last_name'];
            $EPF = $result['epf'];
            $username = $result['username'];
            $department = $result['department'];
            $password = $result['password'];
            $role = $result['role'];
        } else {
            // user not found
            header('Location: users.php?err=user_not_found');
        }
    } else {
        // query unsuccessful
        // header('Location: users.php?err=query_failed');
    }
}

if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $department = $_POST['department'];
    $role = $_POST['role'];

    // checking required fields
    $req_fields = array('password');
    $errors = array_merge($errors, check_req_fields($req_fields));

    // checking max length
    $max_len_fields = array('password' => 40);
    $errors = array_merge($errors, check_max_len($max_len_fields));

    if (empty($errors)) {
        // no errors found... adding new record
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        // $hashed_password = sha1($password);

        $query = "UPDATE users SET ";
        $query .= "password = '{$password}', department = '{$department}', role = '{$role}' ";
        $query .= "WHERE user_id = {$user_id} LIMIT 1";

        $result = mysqli_query($connection, $query);

        if ($result) {
            echo 'User updated successfully';
        } else {
            $errors[] = 'Failed to update the password.';
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
                                <input type="text" <?php echo 'value="' . $EPF . '"'; ?> readonly class="form-control"
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
                                <select name="department" class="info_select" style="border-radius: 5px;">
                                    <option selected>--Select Department--</option>
                                    <?php
                                            $query = "SELECT * FROM departments ORDER BY `department` ASC";
                                            $all_departments = mysqli_query($connection, $query);

                                            while ($department = mysqli_fetch_array($all_departments, MYSQLI_ASSOC)) :;
                                            ?>
                                    <option value="<?php echo $department["department_id"]; ?>">
                                        <?php echo strtoupper($department["department"]); ?>
                                    </option>
                                    <?php
                                            endwhile;
                                            ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-8">
                                <select name="role" class="info_select" style="border-radius: 5px;">
                                    <option selected>--Select Role --</option>
                                    <?php
                                                $query = "SELECT * FROM tbl_roles ORDER BY `role` ASC";
                                                $result = mysqli_query($connection, $query);

                                                while ($categories = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                ?>
                                    <option value="<?php echo $categories["role_id"]; ?>">
                                        <?php echo strtoupper($categories["role"]); ?>
                                    </option>
                                    <?php
                                                endwhile;
                                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-8">
                                <input type="password" id="password" class="form-control" placeholder="New Password"
                                    name="password"
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Show Password</label>
                            <div class="col-sm-8">
                                <input type="checkbox" name="showpassword" id="showpassword"
                                    style="width:20px;height:20px">
                            </div>
                        </div>


                        <button type="submit" name="submit"
                            class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center"><i
                                class="fa-solid fa-user" style="margin-right: 5px;"></i>Update Password</button>

                    </fieldset>
                </form>
            </div>
            <!--/col-->
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>