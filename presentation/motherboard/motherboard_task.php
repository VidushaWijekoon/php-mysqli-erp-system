<?php 

ob_start();
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
    <div class="col-md-5 align-self-center"><a href="./motherboard_dashboard.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
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
                        <div class="col-md-3">

                            <fieldset class="mt-2">
                                <legend>QR Scan</legend>

                                <div class="input-group mb-2 mt-2">
                                    <input type="text" id="search" name="search" required value="<?php if (isset($_POST['search'])) {
                                                                                        echo $_POST['search'];
                                                                                    } ?>" placeholder="Search QR">
                                    <!-- <button type="submit" class="btn btn-primary">Search</button> -->
                                </div>
                            </fieldset>
                        </div>

                        <div class="col col-lg-12 mb-3">
                            <fieldset>
                                <legend>Production Team Members Daily View</legend>

                                <table id="example1" class="table table-bordered table-striped">
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
                                    <tbody class="table-dark text-uppercase">
                                        <tr>
                                            <td>000100</td>
                                            <td>1000</td>
                                            <td>Dell</td>
                                            <td>i7</td>
                                            <td>8</td>
                                            <td>E5530</td>
                                            <td>2022-10-24 10:23:45</td>
                                            <td>
                                                <span
                                                    class="badge badge-lg badge-danger text-white px-3 text-capitalize">In
                                                    not start</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-lg badge-danger text-white px-3 text-capitalize">In
                                                    not completed</span>
                                            </td>
                                            <td>
                                                <button class='btn btn-xs btn-success mx-1' data-toggle="modal"
                                                    data-target="#modal-sm"><i class='fa-solid fa-check'></i></button>
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

<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Inventory ID 000100</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <fieldset class="mt-2">
                    <legend>QR Scan to Finish</legend>

                    <div class="input-group mb-2 mt-2 mx-auto">
                        <input type="text" name="search" required value="<?php if (isset($_POST['search'])) {
                                                                                        echo $_POST['search'];
                                                                                    } ?>" placeholder="Search QR">
                        <!-- <button type="submit" class="btn btn-primary">Search</button> -->
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<style>
fieldset,
legend {
    all: revert;
    font-size: 12px;
}

textarea {
    text-transform: uppercase;
}

select,
input[type="text"],
[type="search"] {
    height: 22px;
    width: 50%;
    margin: inherit;
    margin-top: 4px;
    font-size: 10px;
    text-transform: uppercase;
    border: 1px solid #f1f1f1;
    border-radius: 10px;
    padding-left: 15px;
    margin-bottom: 10px;
    color: black;

}
</style>
<script>
    let searchbar = document.querySelector('input[name="search"]');
searchbar.focus();
search.value = '';
</script>
<?php include_once('../includes/footer.php'); ?>