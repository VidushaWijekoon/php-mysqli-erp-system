<?php
ob_start(); 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');
include_once('../../dataAccess/403.php');

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

  
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
?>

<div class="row">
    <div class="col col-md-4 col-lg-4">
        <fieldset class="mt-4 mb-2 mx-4">
            <legend>Find Me !!</legend>
            <form name="form" action="#" method="POST">
                <div class="col-sm-8">
                    <select name="part_name" class="info_select w-25 mx-1" style="border-radius: 5px;">
                        <option selected>--Select Item--</option>
                        <?php
                                $query = "SELECT * FROM part_list";
                                $result = mysqli_query($connection, $query);

                                while ($selection = mysqli_fetch_array($result, MYSQLI_ASSOC)) :; ?>

                        <option value="<?php echo $selection["part_name"]; ?>">
                            <?php echo strtoupper($selection["part_name"]); ?>
                        </option>
                        <?php endwhile; ?>
                    </select>
                    <input type="text" class="w-25" name="model">
                    <button type="submit" name="submit" class="btn btn-primary btn-xs mx-2"><i
                            class="fa-solid fa-search" style="margin-right: 5px;"></i>Search</button>
                </div>
            </form>
        </fieldset>
    </div>
</div>

<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col">
        <div class="card">
            <div class="card-body">
                <h4 class=" card-title">Rack 01</h4>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class=" card-title">Rack 02</h4>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class=" card-title">Rack 03</h4>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
        </div>
    </div>
</div>


<?php include_once('../includes/footer.php');   ?>