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

$emp_id = '';
$first_name = '';


if (isset($_GET['emp_id'])) {
    // getting the user information
    $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
    $query = "SELECT * FROM employees WHERE emp_id = {$emp_id} LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            // user found
            $result = mysqli_fetch_assoc($result_set);
            $first_name = $result['first_name'];
            $last_name = $result['last_name'];
            $full_name = $result['full_name'];
            $email = $result['email'];
            $gender = $result['gender'];
            $birthday = $result['birthday'];
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
            $discontinuation_date = $result['discontinuation_date'];
            $old_passport = $result['old_passport'];
        } else {
            // user not found
            header('Location: hr_employees.php?err=user_not_found');
        }
    } else {
        // query unsuccessful
        // header('Location: hr_employees.php?err=query_failed');
    }
}

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./employee_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header d-flex bg-secondary">
                    <div class="mr-auto">
                        <div class="text-center mx-auto mt-1 text-uppercase" style="font-size: 14px;">
                            Employees
                        </div>
                    </div>
                    <form action="" method="GET">
                        <div class="input-group">
                            <span class="mt-1 mx-3" style="font-size: 14px;">Search :</span>
                            <input type="search" name="search"
                                value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control"
                                placeholder="Search data">
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Current Passport</th>
                                <th>Department</th>
                                <th>Gender</th>
                                <th>Resident Country</th>
                                <th>Status</th>
                                <th>Join Date</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_1">

                            <?php 

                                if (isset($_GET['search'])) {
                                    $filtervalues = $_GET['search'];

                                $query = "SELECT *,(departments.department) AS department_name FROM `employees` LEFT JOIN departments ON departments.department_id = employees.department 
                                WHERE CONCAT(first_name, last_name, department, emp_id, birthday, current_passport, labour_category) LIKE '%$filtervalues%'
                                ORDER BY emp_id ASC";
                                $results = mysqli_query($connection, $query);

                                     foreach ($results as $items) {

                                 ?>

                            <tr>
                                <td class="text-capitalize"><?php echo $items['emp_id'] ?></td>
                                <td class="text-capitalize"><?php echo $items['first_name'] ?></td>
                                <td class="text-capitalize"><?php echo $items['last_name'] ?></td>
                                <td class="text-capitalize"><?php echo $items['current_passport'] ?></td>
                                <td class="text-capitalize"><?php echo $items['department_name'] ?></td>
                                <td class="text-capitalize"><?php echo $items['gender'] ?></td>
                                <td class="text-capitalize"><?php echo $items['resident_country'] ?></td>
                                <td class="text-center">
                                    <span class="badge badge-lg badge-info text-white p-1 px-3">Active</span>
                                </td>
                                <td class="text-capitalize"><?php echo $items['join_date'] ?></td>
                                <td>
                                    <?php 
                                    echo "<a class='btn btn-xs bg-primary mx-2' href=\"employee_details.php?emp_id={$items['emp_id']}\"><i class='fas fa-eye'></i> </a>";
                                    echo "<a class='btn btn-xs bg-warning mx-2' href=\"edit_employee.php?emp_id={$items['emp_id']}\"><i class='fa-solid fa-pen'></i> </a>";
                                                                           
                                ?>
                                </td>
                            </tr>

                            <?php }
                                }else{
                                    $query = "SELECT *,(departments.department) AS department_name FROM `employees` LEFT JOIN departments ON departments.department_id = employees.department ";
                                    $results = mysqli_query($connection, $query);

                                        foreach ($results as $items) {
                                    ?>

                            <tr>
                                <td class="text-capitalize"><?php echo $items['emp_id'] ?></td>
                                <td class="text-capitalize"><?php echo $items['first_name'] ?></td>
                                <td class="text-capitalize"><?php echo $items['last_name'] ?></td>
                                <td class="text-capitalize"><?php echo $items['current_passport'] ?></td>
                                <td class="text-capitalize"><?php echo $items['department'] ?></td>
                                <td class="text-capitalize"><?php echo $items['gender'] ?></td>
                                <td class="text-capitalize"><?php echo $items['resident_country'] ?></td>
                                <td class="text-center">
                                    <span class="badge badge-lg badge-info text-white p-1 px-3">Active</span>
                                </td>
                                <td class="text-capitalize"><?php echo $items['join_date'] ?></td>
                                <td>
                                    <?php 
                                    echo "<a class='btn btn-xs bg-primary mx-2' href=\"employee_details.php?emp_id={$items['emp_id']}\"><i class='fas fa-eye'></i> </a>";
                                    echo "<a class='btn btn-xs bg-warning mx-2' href=\"edit_employee.php?emp_id={$items['emp_id']}\"><i class='fa-solid fa-pen'></i> </a>";
                                                                           
                                ?>
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

<?php include_once('../includes/footer.php'); ?>