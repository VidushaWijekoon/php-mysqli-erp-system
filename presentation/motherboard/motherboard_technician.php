<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-industry" aria-hidden="true"></i> Motherboard Technician </h3>
    </div>
</div>

<div class="row m-2">
    <div class="col-12 mt-3">
        <a class="btn bg-gradient-success mx-2 text-white" type="button" href="#"><i class="fa-solid fa-check"></i><span
                class="mx-1">Daily Completed Task</span></a>
    </div>
</div>

<div class="col col-lg-12 justify-content-center m-auto">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
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
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S/O ID</th>
                                <th>Brand</th>
                                <th>Processor</th>
                                <th>Core</th>
                                <th>Genaration</th>
                                <th>Model</th>
                                <th>QTY</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-uppercase">
                                <td>1000</td>
                                <td>Dell</td>
                                <td>Intel </td>
                                <td>i7 </td>
                                <td>8th </td>
                                <td>E5530</td>
                                <td>3</td>
                                <td>
                                    <a class='btn btn-xs btn-primary mx-1'
                                        href="./motherboard_technician_daily_task.php"><i data-toggle="modal"
                                            data-target="#modal-assign" class='fas fa-eye'></i> </a>
                                </td>
                            </tr>
                            <tr class="text-uppercase">
                                <td>1000</td>
                                <td>Dell</td>
                                <td>Intel </td>
                                <td>i5 </td>
                                <td>8th </td>
                                <td>E5530</td>
                                <td>6</td>
                                <td>
                                    <a class='btn btn-xs btn-primary mx-1'
                                        href="./motherboard_technician_daily_task.php"><i data-toggle="modal"
                                            data-target="#modal-assign" class='fas fa-eye'></i> </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
        </div>

    </div>
</div>

<!-- Received Modal -->
<div class="modal fade" id="modal-assign">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa-solid fa-user-plus mx-2 bg-warning p-2"></i>SO
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="card-body p-0">
                    <table id="tb1" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Member</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                                <td>#</td>
                                <td><select name="cars" id="cars">
                                        <option value="volvo">1037 - Moses</option>
                                        <option value="saab">1139 - Vigin</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <input class="btn btn-primary" type="submit" name="submit" vlaue="Choose options">

            </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<?php include_once('../includes/footer.php'); ?>