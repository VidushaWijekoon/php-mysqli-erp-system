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

?>

<div class="row page-titles m-2">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-users" aria-hidden="true"></i> Employee Dashboard </h3>
    </div>
</div>


<div class="row m-2">

    <div class="col-12 mt-3">
        <a class="btn btn-info mx-2 text-white" type="button" href="create_employee.php"><i class="fa fa-plus"></i><span class="mx-1">Create Employee</span></a>
        <a class="btn btn-primary mx-2 text-white" type="button" href="employees.php"><i class="fa-solid fa-users"></i><span class="mx-1">Employee List</span></a>
        <a class="btn btn-primary mx-2 text-white" type="button" href="report.php"><i class="fa-solid fa-users"></i><span class="mx-1">Employee Task Report</span></a>
    </div>
</div>


<!-- HR Department -->
<!-- Info boxes -->
<div class="row mt-4 m-2">
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa-sharp fa-solid fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Employees</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `emp_id` FROM `employees`";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }
                    echo "$rowcount";
                    ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-user-plus"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Active Employees</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT * FROM employees WHERE is_active = 0";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }
                    echo "$rowcount";
                    ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">HR</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `department` FROM users WHERE department = 4";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }

                    ?>

                    <?php echo "$rowcount"; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>


</div>
<!-- /.row -->

<!-- Visa Types -->
<!-- Info boxes -->
<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-primary elevation-1"><i class="fa-solid fa-plane"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Tourist Visa</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `visa_type` FROM `employees` WHERE visa_type = 3";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }

                    ?>

                    <?php echo "$rowcount"; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-primary elevation-1"><i class="fa-solid fa-ticket"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Own Visa</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `visa_type` FROM `employees` WHERE visa_type = 8";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }

                    ?>

                    <?php echo "$rowcount"; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-primary elevation-1"><i class="fa-solid fa-industry"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Company Visa</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `visa_type` FROM `employees` WHERE visa_type = 11";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }

                    ?>

                    <?php echo "$rowcount"; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-primary elevation-1"><i class="fa-solid fa-xmark"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Cancel Visa</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `visa_type` FROM `employees` WHERE visa_type = 9";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }

                    ?>

                    <?php echo "$rowcount"; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

</div>

<div class="row page-titles mx-2 mb-2">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa-solid fa-file-export" aria-hidden="true"></i> Departments </h3>
    </div>
</div>

<!-- Info boxes -->
<div class="row m-2 mt-4">
    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box">
            <span class="info-box-icon text-light elevation-1"><i class="fa-solid fa-coins"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Accounts</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `department` FROM `employees` WHERE department = 20";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }
                    echo "$rowcount";
                    ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon text-light elevation-1"><i class="fa-solid fa-store"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `department` FROM `employees` WHERE department = 5";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }
                    echo "$rowcount";
                    ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon text-light elevation-1"><i class="fa-solid fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">HR</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `department` FROM `employees` WHERE department = 4";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }
                    echo "$rowcount";
                    ?>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon text-light elevation-1"><i class="fa-solid fa-rectangle-ad"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">E-Commerce</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `department` FROM `employees` WHERE department = 16";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }
                    echo "$rowcount";
                    ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon text-light elevation-1"><i class="fa-brands fa-git-alt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Software Developing</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `department` FROM `employees` WHERE department = 11";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }
                    echo "$rowcount";
                    ?>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->



</div>

<!-- Info boxes -->
<div class="row m-2">

    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon text-light elevation-1"><i class="fa-solid fa-warehouse"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Inventory</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `department` FROM `employees` WHERE department = 2";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }
                    echo "$rowcount";
                    ?>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box">
            <span class="info-box-icon text-light elevation-1"><i class="fa-solid fa-industry"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Production</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `department` FROM `employees` WHERE department = 1";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }
                    echo "$rowcount";
                    ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon text-light elevation-1"><i class="fa-solid fa-keyboard"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Motherboard</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `department` FROM `employees` WHERE department = 9";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }
                    echo "$rowcount";
                    ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon text-light elevation-1"><i class="fa-solid fa-tv"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">LCD</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `department` FROM `employees` WHERE department = 10";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }
                    echo "$rowcount";
                    ?>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon text-light elevation-1"><i class="fa-solid fa-laptop"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Bodywork</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `department` FROM `employees` WHERE department = 7";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }
                    echo "$rowcount";
                    ?>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon text-light elevation-1"><i class="fa-solid fa-soap"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Sanding</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `department` FROM `employees` WHERE department = 21";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }
                    echo "$rowcount";
                    ?>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->



</div>

<!-- Info boxes -->
<div class="row m-2">

    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon text-light elevation-1"><i class="fa-solid fa-battery"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Battery</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `department` FROM `employees` WHERE department = 14";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }
                    echo "$rowcount";
                    ?>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon text-light elevation-1"><i class="fa-solid fa-spray-can"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Painting</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `department` FROM `employees` WHERE department = 8";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }
                    echo "$rowcount";
                    ?>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box">
            <span class="info-box-icon text-light elevation-1"><i class="fa-solid fa-stethoscope"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Quality</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `department` FROM `employees` WHERE department = 19";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }
                    echo "$rowcount";
                    ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box">
            <span class="info-box-icon text-light elevation-1"><i class="fa-solid fa-boxes"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Packing</span>
                <span class="info-box-number">
                    <?php

                    $query = "SELECT `department` FROM `employees` WHERE department = 13";

                    if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                        $rowcount = mysqli_num_rows($result);
                    }
                    echo "$rowcount";
                    ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

</div>

<?php include_once('../includes/footer.php');  ?>