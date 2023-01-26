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

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./sales_team_leader_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">

        <div class="col-lg-6 grid-margin stretch-card mt-2">
            <div class="card mt-3">
                <form action="" method="POST">
                    <fieldset class="mx-3 my-2">
                        <legend>Set Laptop Price</legend>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Device</label>
                            <div class="col-sm-8">
                                <select name="device" id="device" style="border-radius: 5px; width: 100%">
                                    <option selected value="">--Select Device--</option>
                                    <?php
                                        $query = "SELECT device FROM warehouse_information_sheet GROUP BY device ASC";
                                        $result = mysqli_query($connection, $query);

                                            while ($xd = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                    ?>
                                    <option value="<?php echo $xd["device"]; ?>">
                                        <?php echo strtoupper($xd["device"]); ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Brand</label>
                            <div class="col-sm-8">
                                <select name="brand" id="brand" class="info_select"
                                    style="border-radius: 5px; width: 100%;">
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Series</label>
                            <div class="col-sm-8">
                                <select name="model" id="model" class="info_select"
                                    style="border-radius: 5px; width: 100%;">
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Model</label>
                            <div class="col-sm-8">
                                <select name="processor" id="processor" class="info_select"
                                    style="border-radius: 5px; width: 100%;">
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Core</label>
                            <div class="col-sm-8">
                                <select name="core" id="core" class="info_select"
                                    style="border-radius: 5px; width: 100%;">
                                </select>
                            </div>
                        </div>


                        <div class="row">
                            <label class="col-sm-3 col-form-label">Generation</label>
                            <div class="col-sm-8">
                                <select name="generation" id="generation" class="info_select"
                                    style="border-radius: 5px; width: 100%;">
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Speed</label>
                            <div class="col-sm-8">
                                <select name="speed" id="speed" class="info_select"
                                    style="border-radius: 5px; width: 100%;">
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">LCD Size</label>
                            <div class="col-sm-8">
                                <select name="lcd_size" id="lcd_size" class="info_select"
                                    style="border-radius: 5px; width: 100%;">
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Resolution</label>
                            <div class="col-sm-8">
                                <select name="resolution" id="resolution" class="info_select"
                                    style="border-radius: 5px; width: 100%;">
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Battery</label>
                            <div class="col-sm-8">
                                <select name="role" class="info_select" style="border-radius: 5px;">
                                    <option selected>--Select Role --</option>
                                    <?php
                                            $query = "SELECT * FROM tbl_roles ORDER BY `role` ASC";
                                            $result = mysqli_query($connection, $query);

                                            while ($categories = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                            ?>
                                    <option value="<?php echo $categories["role_id"]; ?>">
                                        <?php echo strtoupper($categories["role"]); ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Touch</label>
                            <div class="col-sm-8">
                                <select name="role" class="info_select" style="border-radius: 5px;">
                                    <option selected>--Select Role --</option>
                                    <?php
                                            $query = "SELECT * FROM tbl_roles ORDER BY `role` ASC";
                                            $result = mysqli_query($connection, $query);

                                            while ($categories = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                            ?>
                                    <option value="<?php echo $categories["role_id"]; ?>">
                                        <?php echo strtoupper($categories["role"]); ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Optical</label>
                            <div class="col-sm-8">
                                <select name="role" class="info_select" style="border-radius: 5px;">
                                    <option selected>--Select Role --</option>
                                    <?php
                                            $query = "SELECT * FROM tbl_roles ORDER BY `role` ASC";
                                            $result = mysqli_query($connection, $query);

                                            while ($categories = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                            ?>
                                    <option value="<?php echo $categories["role_id"]; ?>">
                                        <?php echo strtoupper($categories["role"]); ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Wholesale Price</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Wholesale Price" name="username">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Discount Price</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Discount Price" name="username">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">E-Commerce Price</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="E-Commerce Price" name="username">
                            </div>
                        </div>

                        <button type="submit" name="submit"
                            class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center"><i
                                class="fa-solid fa-user" style="margin-right: 5px;"></i>Create User</button>

                    </fieldset>
                </form>

            </div>
            <!--/col-->
        </div>

        <div class="col-lg-6 grid-margin stretch-card mt-2">
            <div class="card mt-3">
                <form action="" method="POST">
                    <fieldset class="mx-3 my-2">
                        <legend>Set Prices</legend>

                    </fieldset>
                </form>

            </div>
            <!--/col-->
        </div>

    </div>
</div>

<script>
$(document).ready(function() {
    $("#device").on("change", function() {
        var device = $("#device").val();
        var getURL = "get_quatation_fields.php?device=" + device;
        $.get(getURL, function(data, status) {
            $("#brand").html(data);
        });
    });
});

$(document).ready(function() {
    $("#brand").on("change", function() {
        var brand = $("#brand").val();
        var getURL = "get_quatation_fields.php?brand=" + brand;
        $.get(getURL, function(data, status) {
            $("#model").html(data);
        });
    });
});

$(document).ready(function() {
    $("#model").on("change", function() {
        var model = $("#model").val();
        var getURL = "get_quatation_fields.php?model=" + model;
        $.get(getURL, function(data, status) {
            $("#processor").html(data);
        });
    });
});

$(document).ready(function() {
    $("#processor").on("change", function() {
        var processor = $("#processor").val();
        var getURL = "get_quatation_fields.php?processor=" + processor;
        $.get(getURL, function(data, status) {
            $("#core").html(data);
        });
    });
});

$(document).ready(function() {
    $("#core").on("change", function() {
        var core = $("#core").val();
        var getURL = "get_quatation_fields.php?core=" + core;
        $.get(getURL, function(data, status) {
            $("#generation").html(data);
        });
    });
});

$(document).ready(function() {
    $("#generation").on("change", function() {
        var generation = $("#generation").val();
        var getURL = "get_quatation_fields.php?generation=" + generation;
        $.get(getURL, function(data, status) {
            $("#speed").html(data);
        });
    });
});

$(document).ready(function() {
    $("#speed").on("change", function() {
        var speed = $("#speed").val();
        var getURL = "get_quatation_fields.php?speed=" + speed;
        $.get(getURL, function(data, status) {
            $("#lcd_size").html(data);
        });
    });
});

$(document).ready(function() {
    $("#lcd_size").on("change", function() {
        var lcd_size = $("#lcd_size").val();
        var getURL = "get_quatation_fields.php?lcd_size=" + lcd_size;
        $.get(getURL, function(data, status) {
            $("#lcd_size").html(data);
        });
    });
});
</script>

<?php include_once('../includes/footer.php'); ?>