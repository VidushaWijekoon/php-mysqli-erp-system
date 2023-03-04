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

$errors = array();

$first_name = "";
$last_name = "";
$full_name = "";
$email = "";
$gender = "";
$birthday = "";
$current_passport = "";
$passport_expiring_date = "";
$visa_type = "";
$visa_expiring_date = "";
$contact_number = "";
$relationship = "";
$current_address = "";
$current_country = "";
$permanent_address = "";
$resident_country = "";
$emergency_contact = "";
$profile_photo = "";
$department = "";
$labour_category = "";
$join_date = "";
$note = "";
$old_passport = "";
$discontinuation_date = '';
$created_by = $_SESSION['username'];

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $current_passport = $_POST['current_passport'];
    $passport_expiring_date = $_POST['passport_expiring_date'];
    $visa_type = $_POST['visa_type'];
    $visa_expiring_date = $_POST['visa_expiring_date'];
    $contact_number = $_POST['contact_number'];
    $relationship = $_POST['relationship'];
    $current_address = $_POST['current_address'];
    $current_country = $_POST['current_country'];
    $permanent_address = $_POST['permanent_address'];
    $resident_country = $_POST['resident_country'];
    $emergency_contact = $_POST['emergency_contact'];
    $profile_photo = $_POST['profile_photo'];
    $department = $_POST['department'];
    $labour_category = $_POST['labour_category'];
    $join_date = $_POST['join_date'];
    $note = $_POST['note'];
    $old_passport = $_POST['old_passport'];

    // checking required fields
    $req_fields = array('first_name', 'last_name', 'full_name', 'gender', 'birthday', 'current_passport', 'passport_expiring_date', 'visa_type', 'visa_expiring_date', 'contact_number', 'relationship', 'current_address', 'current_country', 'permanent_address', 'resident_country', 'emergency_contact',  'department', 'labour_category', 'join_date');
   
    $errors = array_merge($errors, check_req_fields($req_fields));

    // checking max length
    $max_len_fields = array(
        'first_name' => 30, 'last_name' => 30, 'full_name' => 100, 'email' => 50, 'gender' => 10, 'birthday' => 15, 'current_passport' => 15, 'passport_expiring_date' => 15, 'visa_type' => 25, 'visa_expiring_date' => 30,
        'contact_number' => 15, 'relationship' => 15, 'current_address' => 250, 'current_country' => 50, 'permanent_address' => 250, 'resident_country' => 50, 'emergency_contact' => 25, 'department' => 50, 'labour_category' => 50,
        'join_date' => 15, 'note' => 1000,  'old_passport' => 15
    );


    // checking if full name already exists
    $full_name = mysqli_real_escape_string($connection, $_POST['full_name']);
    $query = "SELECT * FROM employees WHERE full_name = '{$full_name}' LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            $errors[] = 'Full name already exists';
        }
    }

    // checking if current passport already exists
    $current_passport = mysqli_real_escape_string($connection, $_POST['current_passport']);
    $query = "SELECT * FROM employees WHERE current_passport = '{$current_passport}' LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            $errors[] = 'Current passport already exists';
        }
    }

    $errors = array_merge($errors, check_max_len($max_len_fields));

    if (empty($errors)) {
        $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
        $full_name = mysqli_real_escape_string($connection, $_POST['full_name']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $gender = mysqli_real_escape_string($connection, $_POST['gender']);
        $birthday = mysqli_real_escape_string($connection, $_POST['birthday']);
        $current_passport = mysqli_real_escape_string($connection, $_POST['current_passport']);
        $passport_expiring_date = mysqli_real_escape_string($connection, $_POST['passport_expiring_date']);
        $visa_type = mysqli_real_escape_string($connection, $_POST['visa_type']);
        $visa_expiring_date = mysqli_real_escape_string($connection, $_POST['visa_expiring_date']);
        $contact_number = mysqli_real_escape_string($connection, $_POST['contact_number']);
        $relationship = mysqli_real_escape_string($connection, $_POST['relationship']);
        $current_address = mysqli_real_escape_string($connection, $_POST['current_address']);
        $current_country = mysqli_real_escape_string($connection, $_POST['current_country']);
        $permanent_address = mysqli_real_escape_string($connection, $_POST['permanent_address']);
        $resident_country = mysqli_real_escape_string($connection, $_POST['resident_country']);
        $emergency_contact = mysqli_real_escape_string($connection, $_POST['emergency_contact']);
        $profile_photo = mysqli_real_escape_string($connection, $_POST['profile_photo']);
        $department = mysqli_real_escape_string($connection, $_POST['department']);
        $labour_category = mysqli_real_escape_string($connection, $_POST['labour_category']);
        $join_date = mysqli_real_escape_string($connection, $_POST['join_date']);
        $note = mysqli_real_escape_string($connection, $_POST['note']);
        $old_passport = mysqli_real_escape_string($connection, $_POST['old_passport']);
        $_POST = "";
 
        $query = strtolower("INSERT INTO employees (first_name, last_name, full_name, email, gender, birthday, current_passport, passport_expiring_date, visa_type, visa_expiring_date,contact_number, relationship, current_address, current_country, permanent_address, resident_country, emergency_contact, profile_photo, department, labour_category, join_date, note, discontinuation_date, old_passport, created_by, is_active) 
        VALUES ('$first_name', '$last_name', '$full_name', '$email' , '$gender', '$birthday', '$current_passport', '$passport_expiring_date', '$visa_type', '$visa_expiring_date', '$contact_number' ,'$relationship', '$current_address', '$current_country', '$permanent_address', '$resident_country', '$emergency_contact', '$profile_photo', '$department', '$labour_category', '$join_date', '$note', '$discontinuation_date', '$old_passport', '$created_by', 0)");
       $result = mysqli_query($connection, $query);

        if ($result) {
            echo "Successfully insert data";
            header("Location: ./employees.php");
        } else {
            $errors[] = 'Failed to add the new record.';
        }
    }
}
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./employee_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fliud">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <?php if (!empty($errors)) { display_errors($errors); } ?>
                <form action="" method="POST">
                    <div class="row mx-2">
                        <div class="col-md-6">

                            <fieldset class="mt-2">
                                <legend>Personal Information</legend>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">First Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="First Name"
                                            name="first_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Last Name"
                                            name="last_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Full Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Full Name"
                                            name="full_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" placeholder="Email" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10">
                                        <select name="gender" class="info_select" style="border-radius: 5px;">
                                            <option selected>--Select Gender--</option>
                                            <?php
                                                $query = "SELECT * FROM `gender` ORDER BY gender_id";
                                                $gender_select = mysqli_query($connection, $query);

                                                while ($gender = mysqli_fetch_array($gender_select, MYSQLI_ASSOC)) :;
                                                ?>
                                            <option value="<?php echo $gender["gender"]; ?>">
                                                <?php echo strtoupper($gender["gender"]); ?>
                                            </option>
                                            <?php
                                                endwhile;
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Birthday</label>
                                    <div class="col-sm-10">
                                        <input name="birthday" class="form-control" type="date" />
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Old Passport</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Old Passport if necessory"
                                            name="old_passport">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Current Passport</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Current Passport"
                                            name="current_passport">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Passport Expiring</label>
                                    <div class="col-sm-10">
                                        <input type="date" id="passport_expiring_date" name="passport_expiring_date"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label mt-2">Visa Type</label>
                                    <div class="col-sm-10">
                                        <select name="visa_type" class="info_select" style="border-radius: 5px;">
                                            <option selected>--Select Visa Type--</option>
                                            <?php
                                                $query = "SELECT * FROM `visa_type` ORDER BY visa_id";
                                                $visa_result = mysqli_query($connection, $query);

                                                while ($visa_types = mysqli_fetch_array($visa_result, MYSQLI_ASSOC)) :;
                                                ?>
                                            <option value="<?php echo $visa_types["visa_id"]; ?>">
                                                <?php echo strtoupper($visa_types["visa_type"]); ?>
                                            </option>
                                            <?php
                                                endwhile;
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Visa Expiring</label>
                                    <div class="col-sm-10">
                                        <input type="date" id="visa_expiring_date" name="visa_expiring_date"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Contact Number</label>
                                    <div class="col-sm-10">
                                        <input type="number" min="0" class="form-control" placeholder="Contact Number"
                                            name="contact_number">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="relationship" class="col-sm-2 col-form-label">Relationship</label>
                                    <div class="col-sm-10">
                                        <select name="relationship" class="info_select" style="border-radius: 5px;">
                                            <option selected>--Select relationship--</option>
                                            <?php
                                                $query = "SELECT * FROM `relationship` ORDER BY relationship_id";
                                                $relationship_states = mysqli_query($connection, $query);

                                                while ($relationships = mysqli_fetch_array($relationship_states, MYSQLI_ASSOC)) :;
                                                ?>
                                            <option value="<?php echo $relationships["relationship"]; ?>">
                                                <?php echo strtoupper($relationships["relationship"]); ?>
                                            </option>
                                            <?php
                                                endwhile;
                                                ?>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="mt-2 mb-2">
                                <legend class="reset">Living Information</legend>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Current Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Current Address"
                                            name="current_address">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Current Country</label>
                                    <div class="col-sm-10">
                                        <select name="current_country" class="info_select" style="border-radius: 5px;">
                                            <option selected>--Select Country--</option>
                                            <?php
                                                $query = "SELECT * FROM countries ORDER BY 'country_name' ASC";
                                                $result = mysqli_query($connection, $query);

                                                while ($countries = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                ?>
                                            <option value="<?php echo $countries["country_name"]; ?>">
                                                <?php echo strtoupper($countries["country_name"]); ?>
                                            </option>
                                            <?php
                                                endwhile;
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Permanent Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Permanent Address"
                                            name="permanent_address">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="country" class="col-sm-2 col-form-label">Resident Country</label>
                                    <div class="col-sm-10">
                                        <select name="resident_country" class="info_select" style="border-radius: 5px;">
                                            <option selected>--Select Country--</option>
                                            <?php
                                                $query = "SELECT * FROM countries ORDER BY 'country_name' ASC";
                                                $result = mysqli_query($connection, $query);

                                                while ($resident_country = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                ?>
                                            <option value="<?php echo $resident_country["country_name"]; ?>">
                                                <?php echo strtoupper($resident_country["country_name"]); ?>
                                            </option>
                                            <?php
                                                endwhile;
                                                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Emergency</label>
                                    <div class="col-sm-10">
                                        <input type="number" min="1" class="form-control"
                                            placeholder="Emergency Contact Number" name="emergency_contact">
                                    </div>
                                </div>
                            </fieldset>
                        </div>


                        <!-- /.col (LEFT) -->
                        <div class="col-md-6">
                            <!-- LINE CHART -->
                            <fieldset class="mt-2">
                                <legend class="reset">Image</legend>
                                <picture class="d-flex">
                                    <source srcset="../../static/dist/img/1.jpg" type="image/svg+xml">
                                    <img src="../../static/dist/img/1.jpg" class="img-fluid img-thumbnail" alt="..."
                                        width="25%">
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                        name="profile_photo">
                                </picture>
                            </fieldset>

                            <fieldset class="reset">
                                <legend class="reset">Company Information</legend>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Department</label>
                                    <div class="col-sm-10">
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
                                    <label class="col-sm-2 col-form-label">Labour Category</label>
                                    <div class="col-sm-10">
                                        <select name="labour_category" class="info_select" style="border-radius: 5px;">
                                            <option selected>--Select Labour Category--</option>
                                            <?php
                                                $query = "SELECT * FROM tbl_roles ORDER BY role ASC";
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
                                    <label class="col-sm-2 col-form-label">Join Date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" name="join_date" />
                                    </div>
                                </div>

                            </fieldset>

                            <fieldset class="reset">
                                <legend class="reset">Special Note</legend>
                                <div class="mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="About Employee " name="note"></textarea>
                                </div>
                            </fieldset>


                            <div class="mt-3 mb-3 text-center">
                                <button type="submit" name="submit" class="btn btn-sm btn-success mx-2"><i
                                        class="fa-solid fa-floppy-disk mx-1"></i>Save</button>
                                <button class="btn btn-sm btn-warning mx-2"><i
                                        class="fa-solid fa-broom mx-1"></i>Clear</button>
                                <a href="hr_dashboard.php" class="btn btn-sm btn-danger mx-2"><i
                                        class="fa-solid fa-xmark mx-1"></i>Close</a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); ?>