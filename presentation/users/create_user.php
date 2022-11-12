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
$role = '';
$location = '';

if (isset($_POST['submit'])) {

    $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    $epf = mysqli_real_escape_string($connection, $_POST['epf']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $department = mysqli_real_escape_string($connection, $_POST['department']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $role = mysqli_real_escape_string($connection, $_POST['role']);
    $_POST['submit'] = " ";

    // checking required fields
    $req_fields = array('first_name', 'last_name', 'epf', 'username', 'department', 'password', 'role');
    $errors = array_merge($errors, check_req_fields($req_fields));

    // checking max length
    $max_len_fields = array('first_name' => 50, 'last_name' => 100, 'password' => 40, 'username' => 25, 'role' => 25);
    $errors = array_merge($errors, check_max_len($max_len_fields));

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
        $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
        $epf = mysqli_real_escape_string($connection, $_POST['epf']);
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $department = mysqli_real_escape_string($connection, $_POST['department']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $role = mysqli_real_escape_string($connection, $_POST['role']);

        $query = "INSERT INTO users ( ";
        $query .= "first_name, last_name, epf, username, department, password, is_deleted, role, isActive, location";
        $query .= ") VALUES (";
        $query .= "'{$first_name}', '{$last_name}', '{$epf}', '{$username}', '{$department}', '{$password}', 0, '{$role}', 0, 0";
        $query .= ")";
        $result = mysqli_query($connection, $query);

        $new = $connection->insert_id;
        
        if ($result) {            
            echo '<script>alert("User Added Successfully")</script>';
            header('Location: users_dashboard.php');
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
                <form action="" method="POST">
                    <?php if (!empty($errors)) { display_errors($errors); } ?>
                    <fieldset class="mx-3 my-2">
                        <legend>Create New User</legend>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Employee ID</label>
                            <div class="col-sm-8">
                                <select name="epf" class="info_select" style="border-radius: 5px;">
                                    <option selected>--Select Employee ID--</option>
                                    <?php
                                            $query = "SELECT emp_id FROM employees LEFT OUTER JOIN users  ON emp_id = epf WHERE epf IS NULL
                                            UNION ALL
                                            SELECT epf FROM users LEFT OUTER JOIN employees  ON epf = emp_id WHERE epf IS NULL;";
                                            $result = mysqli_query($connection, $query);

                                            while ($emp_id = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                            ?>
                                    <option value="<?php echo $emp_id["emp_id"]; ?>">
                                        <?php echo strtoupper($emp_id["emp_id"]); ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

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
                            <label class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Username" name="username">
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
                                    <?php endwhile; ?>
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
                                    <?php endwhile; ?>
                                </select>
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
                </form>

            </div>
            <!--/col-->
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>