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
        <h3 class="text-themecolor"><i class="fa fa-industry" aria-hidden="true"></i> Motherboard Technician Daily Task
        </h3>
    </div>
</div>


<div class="container-fliud">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <form action="" method="POST">
                    <div class="row mx-2">
                        <div class="col-md-3">

                            <fieldset class="mt-2">
                                <legend>QR Scan</legend>

                                <div class="input-group mb-2 mt-2">
                                    <input type="text" name="search" id="search" required value="<?php if (isset($_POST['search'])) {
                                                                                        echo $_POST['search'];
                                                                                    } ?>" placeholder="Search QR">
                                </div>
                            </fieldset>
                        </div>

                        <div class="col col-lg-12 mb-3">
                            <fieldset>
                                <legend>My Task</legend>

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Inventory ID</th>
                                            <th>S/O ID</th>
                                            <th>Brand</th>
                                            <th>Core</th>
                                            <th>Genaration</th>
                                            <th>Model</th>
                                            <th>Starting Time</th>
                                            <th>End Time</th>
                                            <th>Minutes to Complete</th>
                                            <th>&nbsp;</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>000113</td>
                                            <td>1000</td>
                                            <td>Dell</td>
                                            <td>i7</td>
                                            <td>8th</td>
                                            <td>E5530</td>
                                            <td>2022-11-12 17:13</td>
                                            <td>
                                                <span class="badge badge-lg badge-danger text-white">Not Finished</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-lg badge-danger text-white">0 Minutes</span>
                                                </span>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
let searchbar = document.querySelector('input[name="search"]');
searchbar.focus();
search.value = '';
</script>



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