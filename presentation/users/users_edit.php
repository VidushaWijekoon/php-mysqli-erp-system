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
$first_name = '';
$last_name = '';
$epf = '';
$username = '';
$department = '';
$email = '';
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
            $email = $result['email'];
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
    $user_id = $_POST['user_id'];
    $department = $_POST['department'];

    if (empty($errors)) {
        // no errors found... adding new record
        $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
        // email address is already sanitized

        $query = "UPDATE users SET ";
        $query .= "username = '{$username}' ";
        $query .= "department = '{$department}' ";
        $query .= "WHERE user_id = {$user_id} LIMIT 1";

        $result = mysqli_query($connection, $query);

        if ($result) {
            // query successful... redirecting to users page
            header('Location: users.php?user_modified=true');
        } else {
            $errors[] = 'Failed to modify the record.';
        }
    }

    if (isset($_POST['submit'])) {
        $user_id = $_POST['user_id'];
        $department = $_POST['department'];
        $username = $_POST['username'];

        // checking required fields
        $req_fields = array('user_id', 'department');
        $errors = array_merge($errors, check_req_fields($req_fields));

        // checking max length
        $max_len_fields = array('department' => 40);
        $errors = array_merge($errors, check_max_len($max_len_fields));

        if (empty($errors)) {
            // no errors found... adding new record
            $department = mysqli_real_escape_string($connection, $_POST['department']);
            $username = mysqli_real_escape_string($connection, $_POST['username']);

            // $hashed_password = sha1($password);

            $query = "UPDATE users SET ";
            $query .= "department = '{$department}', username = '{$username}' ";
            $query .= "WHERE user_id = {$user_id} LIMIT 1";

            $result = mysqli_query($connection, $query);

            if ($result) {
                // query successful... redirecting to users page
                // header('Location: users.php?user_changepassword=true');
            } else {
                $errors[] = 'Failed to update the department.';
            }
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
                <div class="card-header">

                    <form action="" method="POST">
                        <fieldset>
                            <?php

                                    if (!empty($errors)) {
                                        display_errors($errors);
                                    }

                                ?>
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
                                    <input type="text" <?php echo 'value="' . $epf . '"'; ?> readonly
                                        class="form-control" name="epf">
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
                                    <input type="text" <?php echo 'value="' . $role . '"'; ?> readonly
                                        class="form-control" name="role">
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" <?php echo 'value="' . $email . '"'; ?> readonly
                                        class="form-control" name="email">
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <span class="mx-2">******</span> | <a class="text-warning mx-2"
                                        href="user_changepassword.php?user_id=<?php echo $user_id; ?>">Change
                                        Password</a>
                                </div>
                            </div>

                        </fieldset>
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
}

#exampleFormControlTextarea1 {
    font-size: 12px;
}
</style>

<script>
setTimeout(function() {
    if ($('#msg').length > 0) {
        $('#msg').remove();
    }
}, 10000)
</script>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>