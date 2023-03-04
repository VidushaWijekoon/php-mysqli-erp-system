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
 
$emp_id = "";
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


if (isset($_GET['emp_id'])) {
    // getting the user information
    $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
    $query = "SELECT * FROM employees WHERE emp_id = {$emp_id} LIMIT 1";

    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        if (mysqli_num_rows($query_run) == 1) {
            // user found
            $result = mysqli_fetch_assoc($query_run);
            $first_name = $result['first_name'];
            $last_name = $result['last_name'];
            $full_name = $result['full_name'];
            $email = $result['email'];
            $gender = $result['gender'];
            $current_passport = $result['current_passport'];
            $passport_expiring_date = $result['passport_expiring_date'];
            $visa_type = $result['visa_type'];
            $visa_expiring_date = $result['visa_expiring_date'];
            $contact_number = $result['contact_number'];
            $relationship = $result['relationship'];
            $current_address = $result['current_address'];
            $current_country = $result['current_country'];
            $permanent_address = $result['permanent_address'];
            $resident_country = $result['resident_country'];
            $emergency_contact = $result['emergency_contact'];
            $profile_photo = $result['profile_photo'];
            $department = $result['department'];
            $labour_category = $result['labour_category'];
            $join_date = $result['join_date'];
            $note = $result['note'];
            $old_passport = $result['old_passport'];
        } else {
            // user not found
            header('Location: hr_employees.php?err=user_not_found');
        }
    } else {
        // query unsuccessful
        // header('Location: hr_employees.php?err=query_failed');
    }

     while ($rowcount = mysqli_fetch_array($query_run) > 0) {
            if ($query_run) {
                if (mysqli_fetch_array($query_run)) {
                    $result = mysqli_num_rows($query_run);
 
                    $emp_id = '';

                    $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
                    $discontinuation_date = mysqli_real_escape_string($connection, $_POST['discontinuation_date']);

                     // Send one item to  item to production
                    $query = "UPDATE employees SET discontinuation_date = '$discontinuation_date'
                            WHERE emp_id = {$emp_id} LIMIT 1";
                    $result = mysqli_query($connection, $query);
                }
            }
        }   
}

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./employees.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fliud">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <form action="" method="POST">
                    <div class="row mx-2">
                        <div class="col-md-6">

                            <fieldset class="mt-2">
                                <legend>Personal Information</legend>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">First Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" readonly
                                            <?php echo 'value="' . $first_name . '" ' ?>>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" readonly
                                            <?php echo 'value="' . $last_name . '" ' ?>>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Full Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" readonly
                                            <?php echo 'value="' . $full_name . '" ' ?>>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" readonly
                                            <?php echo 'value="' . $email . '" ' ?>>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" readonly
                                            <?php echo 'value="' . $gender . '" ' ?>>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Birthday</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" readonly
                                            <?php echo 'value="' . $birthday . '" ' ?>>
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
                                        <input id="startDate" class="form-control" type="date"
                                            name="passport_expiring_date" />
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Visa Type</label>
                                    <div class="col-sm-10">
                                        <select name="visa_type" style="border-radius: 5px;">
                                            <option selected>--Select Visa Type--</option>
                                            <?php
                                                $query = "SELECT * FROM `visa_type` ORDER BY visa_id";
                                                $visa_result = mysqli_query($connection, $query);

                                                while ($visa_types = mysqli_fetch_array($visa_result, MYSQLI_ASSOC)) :;
                                                ?>
                                            <option value="<?php echo $visa_types["visa_type"]; ?>">
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
                                        <input id="startDate" class="form-control" type="date"
                                            name="visa_expiring_date" />
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Contact Number</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" placeholder="Contact Number"
                                            name="contact_number">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="relationship" class="col-sm-2 col-form-label">Relationship</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" readonly
                                            <?php echo 'value="' . $relationship . '" ' ?>>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="mt-2 mb-2">
                                <legend class="reset">Living Information</legend>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Current Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" readonly
                                            <?php echo 'value="' . $current_address . '" ' ?>>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Current Country</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" readonly
                                            <?php echo 'value="' . $relationship . '" ' ?>>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Permanent Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" readonly
                                            <?php echo 'value="' . $permanent_address . '" ' ?>>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="country" class="col-sm-2 col-form-label">Resident Country</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" readonly
                                            <?php echo 'value="' . $resident_country . '" ' ?>>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Emergency</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" readonly
                                            <?php echo 'value="' . $emergency_contact . '" ' ?>>
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
                                        <select name="department" style="border-radius: 5px;">
                                            <option selected>--Select Department--</option>
                                            <?php
                                                $query = "SELECT * FROM departments ORDER BY `department` ASC";
                                                $all_departments = mysqli_query($connection, $query);

                                                while ($department = mysqli_fetch_array($all_departments, MYSQLI_ASSOC)) :;
                                                ?>
                                            <option value="<?php echo $department["department"]; ?>">
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
                                        <select name="labour_category" style="border-radius: 5px;">
                                            <option selected>--Select Labour Category--</option>
                                            <?php
                                                $query = "SELECT * FROM labour_category ORDER BY labour_category ASC";
                                                $result = mysqli_query($connection, $query);

                                                while ($categories = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                ?>
                                            <option value="<?php echo $categories["labour_category"]; ?>">
                                                <?php echo strtoupper($categories["labour_category"]); ?>
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
                                        <input type="date" class="form-control" readonly
                                            <?php echo 'value="' . $join_date . '" ' ?>>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Discontinuation Date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" name="discontinuation_date">
                                    </div>
                                </div>>

                            </fieldset>

                            <fieldset class="reset">
                                <legend class="reset">Special Note</legend>
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                            placeholder="About Employee " name="note"></textarea>
                                    </div>

                                </div>
                            </fieldset>

                            <div class="mt-3 mb-3 text-center">
                                <button type="submit" name="submit" class="btn btn-sm btn-success mx-2"><i
                                        class="fa-solid fa-floppy-disk mx-1"></i>Save</button>
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


<style>
textarea {
    text-transform: uppercase;
}

select,
input[type="text"],
[type="number"],
[type="email"],
[type="date"],
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

.form-control-file {
    justify-content: center;
    text-align: center;
    margin: auto;
    margin-left: 15px;
}
</style>

<?php include_once('../includes/footer.php');  ?>