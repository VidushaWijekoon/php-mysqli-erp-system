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
 
$errors = array();

$first_name = '';
$last_name = '';
$epf = '';
$username = '';
$department = '';
$email = '';
$password = '';
$role = '';

if (isset($_POST['submit'])) {

    $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    $epf = mysqli_real_escape_string($connection, $_POST['epf']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $department = mysqli_real_escape_string($connection, $_POST['department']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $role = mysqli_real_escape_string($connection, $_POST['role']);

    // checking required fields
    $req_fields = array('first_name', 'last_name', 'epf', 'username', 'department', 'email', 'password', 'role');
    $errors = array_merge($errors, check_req_fields($req_fields));

    // checking max length
    $max_len_fields = array('first_name' => 50, 'last_name' => 100, 'email' => 100, 'password' => 40, 'username' => 25, 'role' => 25);
    $errors = array_merge($errors, check_max_len($max_len_fields));

    // checking email address
    if (!is_email($_POST['email'])) {
        $errors[] = 'Email address is invalid.';
    }

    // checking if email address already exists
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $query = "SELECT * FROM users WHERE email = '{$email}' LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            $errors[] = 'Email address already exists';
        }
    }

    // checking if username already exists
    $epf = mysqli_real_escape_string($connection, $_POST['epf']);
    $query = "SELECT * FROM users WHERE epf = '{$epf}' LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            $errors[] = 'epf already exists';
        }
    }
    // checking if username already exists
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $query = "SELECT * FROM users WHERE username = '{$username}' LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            $errors[] = 'Username already exists';
        }
    }

    if (empty($errors)) {
        // no errors found... adding new record
        $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
        $epf = mysqli_real_escape_string($connection, $_POST['epf']);
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $department = mysqli_real_escape_string($connection, $_POST['department']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $role = mysqli_real_escape_string($connection, $_POST['role']);

        // email address is already sanitized
        // $hashed_password = sha1($password);

        $query = "INSERT INTO users ( ";
        $query .= "first_name, last_name, epf, username, department, email, password, is_deleted, role, isActive";
        $query .= ") VALUES (";
        $query .= "'{$first_name}', '{$last_name}', '{$epf}', '{$username}', '{$department}', '{$email}', '{$password}', 0, '{$role}', 0";
        $query .= ")";
        $result = mysqli_query($connection, $query);

        $new = $connection->insert_id;
        // echo (int)$new;

        if ($result) {
            echo '<script>alert("User Added Successfully")</script>';
        } else {
            $errors[] = 'Failed to add the new record.';
        }
    }
}

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./users_dashboard.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header">

                    <form action="" method="POST">
                        <fieldset>
                            <legend>Create New User</legend>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name">
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">epf</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" placeholder="epf" name="epf">
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Username" name="username">
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Department</label>
                                <div class="col-sm-8">
                                    <select name="department" style="border-radius: 5px;">
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
                                    <select name="role" style="border-radius: 5px;">
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
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                            </div>

                            <button type="submit" name="submit"
                                class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center"><i
                                    class="fa-solid fa-user" style="margin-right: 5px;"></i>Create User</button>



                        </fieldset>
                        <?php

                    if (!empty($errors)) {
                        display_errors($errors);
                    }

                    ?>
                    </form>

                </div>
                <!--/col-->
            </div>
        </div>
    </div>
</div>


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
[type="email"],
[type='password'] {
    width: 100%;
    height: 22px;
    margin: inherit;
    margin-top: 4px;
    font-size: 10px;
    text-transform: uppercase;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
}

.custom-select {
    font-size: 12px;
}

#exampleFormControlTextarea1 {
    font-size: 12px;
}
</style>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>