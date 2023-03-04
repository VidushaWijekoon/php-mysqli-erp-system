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
$user_id = $_SESSION['user_id'];
$department = $_SESSION['department'];
if ($department == 7) {

?>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center"><a href="./bod_lead.php">
                <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
            </a>
        </div>
    </div>
<?php } else { ?>

    <div class="row page-titles">
        <div class="col-md-5 align-self-center"><a href="./performance_record.php">
                <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
            </a>
        </div>
    </div>
<?php
} ?>
<form action="" method="POST">
    <div class="row w-50">
        <div class="col-md-4">
            <div class="form-group">
                <input type="date" name="from_date" value="<?php if (isset($_POST['from_date'])) {
                                                                echo $_POST['from_date'];
                                                            } ?>" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="date" name="to_date" value="<?php if (isset($_POST['to_date'])) {
                                                                echo $_POST['to_date'];
                                                            } ?>" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <button type="submit" class="btn btn-xs btn-primary px-3" style=" font-size: 10px; margin-top: 4px; border-radius: 7px; letter-spacing: 1px;">Search
                    Date</button>
            </div>
        </div>
    </div>
</form>
<div>
    <form action="" method="POST">
        <div class="row w-50">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" name="search_value" class="form-control" placeholder="scan here">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <button type="submit1" name="submit1" class="btn btn-xs btn-primary px-3 d-none" style=" font-size: 10px; margin-top: 4px; border-radius: 7px; letter-spacing: 1px;">Search
                        Date</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
$date = '';
$qr_code = '';
$name = '';
$search_value = '0';
if (isset($_POST['submit1'])) {
    $qr_number = $_POST['search_value'];

    $query = "SELECT * FROM performance_record_table WHERE qr_number ='$qr_number'AND department_id ='$department'";
    $query_run = mysqli_query($connection, $query);
    foreach ($query_run as $a) {
        $date = $a['end_time'];
        $qr_code = $a['qr_number'];
        $name = $a['user_id'];
        $search_value = $qr_number;
    }
    $qr_number = 0;
}

?>

<div class="col col-lg-12 justify-content-center m-auto text-uppercase">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-body">

                    <h1> Name : <?php $emp_id = $_SESSION['epf'];
                                $query = "SELECT full_name FROM employees WHERE emp_id ='$emp_id'";
                                $query_run = mysqli_query($connection, $query);
                                foreach ($query_run as $data) {
                                    echo $data['full_name'];
                                } ?><br>
                        EmpID :<?php echo $_SESSION['epf'] ?><br>
                        Department :
                        <?php $department_id = $_SESSION['department'];
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT department FROM departments WHERE department_id='$department_id'";
                        $query_run = mysqli_query($connection, $query);
                        foreach ($query_run as $data) {
                            echo $data['department'];
                        } ?><br>
                        Completed QTY :
                        <?php $date = date('Y-m-d 00:00:00');
                        $date2 = date('Y-m-d 23:59:59');
                        $i = -1;
                        $y = 0;
                        $from_date = 0;
                        $to_date = 0;
                        if (isset($_POST['from_date']) && isset($_POST['to_date'])) {

                            $from_date = $_POST['from_date'];
                            $to_date = $_POST['to_date'];
                        }
                        if ($from_date != 0) {
                            $query = "SELECT * FROM performance_record_table WHERE department_id=$department_id AND end_time between '$from_date'AND '$to_date' ORDER BY end_time DESC";
                            $query_run = mysqli_query($connection, $query);
                            $rowcount = mysqli_num_rows($query_run);
                            echo $rowcount . " task completed in" . $from_date . " to " . $to_date;
                        }
                        ?>

                    </h1>
                    <table id="example2" class="table table-bordered table-striped">
                        <table id="tblexportData" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>QR Code number</th>
                                    <th>Job Description</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($search_value == '0') {
                                    $date = date('Y-m-d 00:00:00');
                                    $date2 = date('Y-m-d 23:59:59');
                                    $i = -1;
                                    $y = 0;
                                    $from_date = 0;
                                    $to_date = 0;
                                    if (isset($_POST['from_date']) && isset($_POST['to_date'])) {
                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];
                                    }
                                    if ($from_date != 0) {
                                        $query = "SELECT * FROM performance_record_table WHERE department_id=$department_id AND end_time between '$from_date'AND '$to_date'ORDER BY end_time DESC";
                                        $query_run = mysqli_query($connection, $query);

                                        foreach ($query_run as $data) {
                                ?>
                                            <tr>
                                                <td><?php echo $data['end_time'] ?></td>
                                                <td><?php echo $data['qr_number'] ?></td>
                                                <td><?php echo $data['job_description'] ?></td>
                                                <td><?php $user_id = $data['user_id'];
                                                    $query = "SELECT full_name FROM employees LEFT JOIN users ON users.epf = employees.emp_id 
                                            WHERE users.user_id ='$user_id' ";
                                                    $query_run = mysqli_query($connection, $query);
                                                    foreach ($query_run as $data) {
                                                        echo $data['full_name'];
                                                    } ?></td>
                                            </tr>
                                    <?php }
                                    }
                                } else { ?>
                                    <tr>
                                        <td> <?php echo $date ?></td>
                                        <td><?php echo $search_value ?></td>
                                        <td><?php
                                            $query = "SELECT full_name FROM employees LEFT JOIN users ON users.epf = employees.emp_id 
                                            WHERE users.user_id ='$name' ";
                                            $query_run = mysqli_query($connection, $query);
                                            foreach ($query_run as $data) {
                                                echo $data['full_name'];
                                            } ?></td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include_once('../includes/footer.php'); ?>