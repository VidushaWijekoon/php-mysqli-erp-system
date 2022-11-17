<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');
$emp_id =  $_SESSION['epf'];
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
 

?>

<div class="row m-2">
    <div class="col-12 mt-3 d-flex">
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="producton_technician_daily_work.php"><i
                class="fa-solid fa-users"></i><span class="mx-1">Completed Work</span></a>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-5">
            <div class="card mt-5">
                <div class="card-header d-flex bg-secondary">
                    <div class="mr-auto">
                        <div class="text-center mx-auto mt-1 text-uppercase" style="font-size: 14px;">
                            Daily Work
                        </div>
                    </div>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="date" name="from_date"
                                        value="<?php if(isset($_POST['from_date'])){ echo $_POST['from_date']; } ?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="date" name="to_date"
                                        value="<?php if(isset($_POST['to_date'])){ echo $_POST['to_date']; } ?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-xs btn-primary px-3"
                                        style=" font-size: 10px; margin-top: 4px; border-radius: 7px; letter-spacing: 1px;">Select
                                        Date</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>SO ID</th>
                                <th>Assigned Date</th>
                                <th>Assigned QTY</th>
                                <th>Complete QTY</th>
                                <th style="width:150px ">&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_1">

                            <?php 

                                $query_prod_tech ="SELECT * FROM motherboard_assign WHERE emp_id ='{$emp_id}'";                           
                                $query_6 = mysqli_query($connection, $query_prod_tech);
                                while($row = mysqli_fetch_assoc($query_6)){
                                    print_r($row);
                                    echo $emp_id;
                                
                                                   
                            ?>
                            <tr>
                                <td>#</td>
                                <td><?php echo $row['sales_order_id'] ?></td>

                            </tr>
                            <?php } ?>
                        </tbody>

                    </table>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); ?>