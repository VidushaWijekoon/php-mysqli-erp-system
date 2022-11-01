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
                                    <input type="text" name="search" id="search" required value="<?php if (isset($_POST['search'])) {
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
                                        <?php 
                                        $sales_order_id = '';

                                        // getting the list of users
                                        $query = "SELECT
                                        *,
                                        brand,core,model,generation,processor,device
                                    FROM
                                        prod_info
                                    LEFT JOIN warehouse_information_sheet ON prod_info.inventory_id = warehouse_information_sheet.inventory_id
                                    WHERE
                                          prod_info.emp_id ='{$emp_id}' AND prod_info.tech_id ='{$tech_id}' ; ";
                                        $query_run = mysqli_query($connection, $query);

                                            if ($rowcount = mysqli_fetch_assoc($query_run)) {
                                                foreach($query_run as $values) {
                                        ?>

                                        <tr>
                                            <td><?php echo $values['inventory_id'] ?></td>
                                            <td><?php echo $values['sales_order'] ?></td>
                                            <td><?php echo $values['brand'] ?></td>
                                            <td><?php echo $values['core'] ?></td>
                                            <td><?php echo $values['generation'] ?></td>
                                            <td><?php echo $values['model'] ?></td>
                                            <td><?php echo $values['start_date_time'] ?></td>
                                            <td>
                                                <?php if( $values['end_date_time'] == '0000-00-00 00:00:00') {?>
                                                <span class="badge badge-lg badge-danger text-white">Not Finished</span>
                                                <?php } else { ?>
                                                <span><?php echo $values['start_date_time'] ?></span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if( $values['end_date_time'] == '0000-00-00 00:00:00') {?>
                                                <span class="badge badge-lg badge-danger text-white">0 Minutes</span>
                                                <?php } elseif( $values['start_date_time'] != '0000-00-00 00:00:00') {?>
                                                <span class="badge badge-lg badge-success text-white">
                                                    <?php $working_time_in_seconds = strtotime($values['end_date_time']) - strtotime($values['start_date_time']);
                                                       echo date('H:i:s', $working_time_in_seconds ); 
                                                    ?>
                                                </span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if($values['status'] == 1){ echo "<a class='btn btn-sm bg-teal'
                                                    href=\"motherboard_checklist.php?emp_id={$emp_id}&inventory_id={$values['inventory_id']}&sales_order_id={$values['sales_order_id']}\"><i
                                                        class='fas fa-eye'></i> </a>";}else{ 
                                                        if ($values['issue_type'] ==1) {
                                                            echo '<span class="badge badge-lg badge-danger text-white px-2">Motherboard Issue</span>';
                                                        }if ($values['issue_type'] ==2) {
                                                            echo '<span class="badge badge-lg badge-danger text-white px-2">Combine Issue</span>';
                                                        }if ($values['issue_type'] ==3) {
                                                            echo '<span class="badge badge-lg badge-danger text-white px-2">LCD Issue</span>';
                                                        }if ($values['issue_type'] ==4) {
                                                            echo '<span class="badge badge-lg badge-danger text-white px-2">Bodywork Issue</span>';
                                                        }if ($values['issue_type'] ==5) {
                                                            echo '<span class="badge badge-lg badge-danger text-white px-2">Ready to QC</span>';
                                                        } 
                                                        }?>
                                            </td>
                                        </tr>
                                        <?php }} ?>
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