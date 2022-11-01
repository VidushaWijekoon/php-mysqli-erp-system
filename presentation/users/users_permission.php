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
 
?>

<link rel="stylesheet" href="../../css/main.css">

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-5">
            <div class="card">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">User Permisson Levels</p>
                </div>
                <div class="card-body">

                    <form method="POST">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Department</th>
                                    <th>Read</th>
                                    <th>Edit</th>
                                    <th>Upate</th>
                                    <th>Delete</th>
                                    <th>Report</th>
                                </tr>
                            </thead>
                            <tbody class="tbody_1">
                                <?php
                            
 
                                 $query = "SELECT * FROM departments ORDER BY department";
                                $query_run = mysqli_query($connection, $query);

                                if ($rowcount = mysqli_fetch_assoc($query_run)) {
                                    foreach ($query_run as $dep) {
                                 
                                ?>

                                <tr>
                                    <td class="text-uppercase"><?php echo $dep['department'] ?></td>
                                    <td>
                                        <?php 
                                        echo    '<div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="rd" id="flexCheckDefault">
                                                </div> ' 
                                        ?>

                                    </td>
                                    <td>
                                        <?php 
                                        echo    '<div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="rd" id="flexCheckDefault">
                                                </div> ' 
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        echo    '<div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="rd" id="flexCheckDefault">
                                                </div> ' 
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        echo    '<div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="rd" id="flexCheckDefault">
                                                </div> ' 
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        echo    '<div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="rd" id="flexCheckDefault">
                                                </div> ' 
                                        ?>
                                    </td>

                                </tr>

                                <?php 
                                    }
                                }
                            ?>

                            </tbody>
                        </table>
                        <button class="btn btn-sm btn-primary m-0" name="submit" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>