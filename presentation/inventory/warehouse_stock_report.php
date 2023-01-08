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

if(($role_id == 1 && $department == 11) || ($role_id == 4 && $department == 2) || ($role_id == 2 && $department == 18) || ($role_id == 10 && $department == 2)){
 

?>

<!-- <div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./warehouse_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div> -->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Stock Report</p>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Brand</th>
                                <th>In Total</th>
                                <th>In Stock</th>
                                <th>Dispatch</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="table-dark">
                            <?php
                                $brand = null;
                                $main_stock = null;
                                $in_total = null;
                                $in_stock = null;
                                $dispatch = null;
                                  $query = "SELECT *,  COUNT(inventory_id) as main_total FROM `warehouse_information_sheet` GROUP BY brand";
                                  $result = mysqli_query($connection, $query);
                                foreach($result as $data){
                                    $brand = $data['brand'];
                                    $main_stock = $data['main_total'];
                                    echo "
                                    <tr>
                                    <td></td>
                                    <td> $brand</td>
                                    <td> $main_stock</td>";
                                    echo "<td>";
                                    $query ="SELECT COUNT(inventory_id) as in_stock FROM `warehouse_information_sheet` WHERE brand = '$brand' AND send_to_production = '0'";
                                    $result = mysqli_query($connection, $query);
                                    foreach($result as $data){
                                        $in_stock = $data['in_stock'];

                                    }
                                    echo $in_stock;
                                    echo "</td>
                                    <td>";
                                    $query ="SELECT  COUNT(inventory_id) as dispatch FROM `warehouse_information_sheet` WHERE brand = '$brand' AND send_to_production = '1'";
                                    $result = mysqli_query($connection, $query);
                                    foreach($result as $data){
                                        $dispatch = $data['dispatch'];

                                    }
                                    echo $dispatch;
                                    echo "</td>
                                    <td class='text-center'>
                                        <a class='btn btn-xs bg-primary ' 
                                            href='model_view.php?brand=$brand'><i class='fas fa-eye'></i>
                                        </a>
                                    </td>
                                </tr>";
                                } ?>

                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

<!-- Dell Modal -->
<div class="modal fade" id="modal-dell-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header bg-secondary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="text-uppercase  p-0 m-0">dell Laptop Inventroy</p>
                <p class="text-uppercase mt-2 m-0">In stock dell Laptops:
                    <?php

                        $query = "SELECT inventory_id FROM warehouse_information_sheet WHERE brand = 'dell' AND send_to_production = 0";

                        if ($result = mysqli_query($connection, $query)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        ?><?php echo "$rowcount"; ?>

            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Model</th>
                            <th>Processor</th>
                            <th>Core</th>
                            <th>Genaration</th>
                            <th>In Stock</th>
                            <th style="width: 200px;">Location</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $query = "SELECT *, COUNT(*) AS No_of_Records FROM warehouse_information_sheet WHERE brand = 'dell' AND send_to_production = 0 GROUP BY model, processor, core, generation, location HAVING COUNT(*) >= 1 ";
                            $query_run = mysqli_query($connection, $query);

                            if ($rowcount = mysqli_num_rows($query_run)) {
                                foreach ($query_run as $items) {

                                    // Return the number of rows in result set

                            ?>
                        <tr>
                            <td>#</td>
                            <td class="text-uppercase"><?= $items['model'] ?></td>
                            <td class="text-uppercase"><?= $items['processor'] ?></td>
                            <td class="text-uppercase"><?= $items['core'] ?></td>
                            <td class="text-uppercase"><?= $items['generation'] ?></td>
                            <td class="text-uppercase"><?php echo $items['No_of_Records']; ?></td>
                            <td class="text-uppercase">
                                <?= $items['location']."-".$items['generation']."-".$items['model'] ?>
                            </td>
                            <td>
                                <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"warehouse_inventory_id_list.php?brand={$items['brand']}&model={$items['model']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                            </td>
                        </tr>
                        <?php
                            
                                }
                            }
                            ?>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- HP Modal -->
<div class="modal fade" id="modal-hp-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="text-uppercase  p-0 m-0">hp Laptop Inventroy</p>

                <p class="text-uppercase mt-2 m-0">In stock hp Laptops:
                    <?php

                        $query = "SELECT inventory_id FROM warehouse_information_sheet WHERE brand = 'hp' AND send_to_production = 0";

                        if ($result = mysqli_query($connection, $query)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        ?><?php echo "$rowcount"; ?>

            </div>
            <div class="modal-body">
                <table id="hp" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Model</th>
                            <th>Processor</th>
                            <th>Core</th>
                            <th>Genaration</th>
                            <th>In Stock</th>
                            <th style="width: 200px;">Location</th>
                            <th>&nbsp;</th>

                        </tr>
                    </thead>
                    <tbody class="table-dark">
                        <?php

                            $query = "SELECT *, COUNT(*) AS No_of_Records FROM warehouse_information_sheet WHERE brand = 'hp' AND send_to_production = 0 GROUP BY model, processor, core, generation, location HAVING COUNT(*) >= 1 ";
                            $query_run = mysqli_query($connection, $query);

                            if ($rowcount = mysqli_num_rows($query_run)) {
                                foreach ($query_run as $items) {

                                    // Return the number of rows in result set

                            ?>
                        <tr>
                            <td>#</td>
                            <td class="text-uppercase"><?= $items['model'] ?></td>
                            <td class="text-uppercase"><?= $items['processor'] ?></td>
                            <td class="text-uppercase"><?= $items['core'] ?></td>
                            <td class="text-uppercase"><?= $items['generation'] ?></td>
                            <td class="text-uppercase"><?php echo $items['No_of_Records']; ?></td>
                            <td class="text-uppercase">
                                <?= $items['location']."-".$items['generation']."-".$items['model'] ?>
                            </td>
                            <td>
                                <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"warehouse_inventory_id_list.php?brand={$items['brand']}&model={$items['model']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                            ?>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Lenovo Modal -->
<div class="modal fade" id="modal-lenovo-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="text-uppercase  p-0 m-0">lenovo Laptop Inventroy</p>

                <p class="text-uppercase mt-2 m-0">In stock Lenovo Laptops:
                    <?php

                        $query = "SELECT inventory_id FROM warehouse_information_sheet WHERE brand = 'lenovo' AND send_to_production = 0";

                        if ($result = mysqli_query($connection, $query)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        ?><?php echo "$rowcount"; ?>

            </div>
            <div class="modal-body">
                <table id="lenovo" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Model</th>
                            <th>Processor</th>
                            <th>Core</th>
                            <th>Genaration</th>
                            <th>In Stock</th>
                            <th style="width: 200px;">Location</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark">
                        <?php

                            $query = "SELECT *, COUNT(*) AS No_of_Records FROM warehouse_information_sheet WHERE brand = 'lenovo' AND send_to_production = 0 GROUP BY model, processor, core, generation, location HAVING COUNT(*) >= 1 ";
                            $query_run = mysqli_query($connection, $query);

                            if ($rowcount = mysqli_num_rows($query_run)) {
                                foreach ($query_run as $items) {

                                    // Return the number of rows in result set

                            ?>
                        <tr>
                            <td>#</td>
                            <td class="text-uppercase"><?= $items['model'] ?></td>
                            <td class="text-uppercase"><?= $items['processor'] ?></td>
                            <td class="text-uppercase"><?= $items['core'] ?></td>
                            <td class="text-uppercase"><?= $items['generation'] ?></td>
                            <td class="text-uppercase"><?php echo $items['No_of_Records']; ?></td>
                            <td class="text-uppercase">
                                <?= $items['location']."-".$items['generation']."-".$items['model'] ?>
                            </td>
                            <td>
                                <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"warehouse_inventory_id_list.php?brand={$items['brand']}&model={$items['model']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                            ?>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Asus Modal -->
<div class="modal fade" id="modal-asus-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="text-uppercase  p-0 m-0">asus Laptop Inventroy</p>

                <p class="text-uppercase mt-2 m-0">In stock asus Laptops:
                    <?php

                        $query = "SELECT inventory_id FROM warehouse_information_sheet WHERE brand = 'asus' AND send_to_production = 0";

                        if ($result = mysqli_query($connection, $query)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        ?><?php echo "$rowcount"; ?>

            </div>
            <div class="modal-body">
                <table id="asus" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Model</th>
                            <th>Processor</th>
                            <th>Core</th>
                            <th>Genaration</th>
                            <th>In Stock</th>
                            <th style="width: 200px;">Location</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark">
                        <?php

                            $query = "SELECT *, COUNT(*) AS No_of_Records FROM warehouse_information_sheet WHERE brand = 'asus' AND send_to_production = 0 GROUP BY model, processor, core, generation, location HAVING COUNT(*) >= 1 ";
                            $query_run = mysqli_query($connection, $query);

                            if ($rowcount = mysqli_num_rows($query_run)) {
                                foreach ($query_run as $items) {

                                    // Return the number of rows in result set

                            ?>
                        <tr>
                            <td>#</td>
                            <td class="text-uppercase"><?= $items['model'] ?></td>
                            <td class="text-uppercase"><?= $items['processor'] ?></td>
                            <td class="text-uppercase"><?= $items['core'] ?></td>
                            <td class="text-uppercase"><?= $items['generation'] ?></td>
                            <td class="text-uppercase"><?php echo $items['No_of_Records']; ?></td>
                            <td class="text-uppercase">
                                <?= $items['location']."-".$items['generation']."-".$items['model'] ?>
                            </td>
                            <td>
                                <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"warehouse_inventory_id_list.php?brand={$items['brand']}&model={$items['model']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                            ?>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Fujitsu Modal -->
<div class="modal fade" id="modal-fujitsu-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="text-uppercase  p-0 m-0">fujitsu Laptop Inventroy</p>

                <p class="text-uppercase mt-2 m-0">In stock fujitsu Laptops:
                    <?php

                        $query = "SELECT inventory_id FROM warehouse_information_sheet WHERE brand = 'fujitsu' AND send_to_production = 0";

                        if ($result = mysqli_query($connection, $query)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        ?><?php echo "$rowcount"; ?>

            </div>
            <div class="modal-body">
                <table id="fujitsu" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Model</th>
                            <th>Processor</th>
                            <th>Core</th>
                            <th>Genaration</th>
                            <th>In Stock</th>
                            <th style="width: 200px;">Location</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark">
                        <?php

                            $query = "SELECT *, COUNT(*) AS No_of_Records FROM warehouse_information_sheet WHERE brand = 'fujitsu' AND send_to_production = 0 GROUP BY model, processor, core, generation, location HAVING COUNT(*) >= 1 ";
                            $query_run = mysqli_query($connection, $query);

                            if ($rowcount = mysqli_num_rows($query_run)) {
                                foreach ($query_run as $items) {

                                    // Return the number of rows in result set

                            ?>
                        <tr>
                            <td>#</td>
                            <td class="text-uppercase"><?= $items['model'] ?></td>
                            <td class="text-uppercase"><?= $items['processor'] ?></td>
                            <td class="text-uppercase"><?= $items['core'] ?></td>
                            <td class="text-uppercase"><?= $items['generation'] ?></td>
                            <td class="text-uppercase"><?php echo $items['No_of_Records']; ?></td>
                            <td class="text-uppercase">
                                <?= $items['location']."-".$items['generation']."-".$items['model'] ?>
                            </td>
                            <td>
                                <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"warehouse_inventory_id_list.php?brand={$items['brand']}&model={$items['model']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                            ?>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Apple Modal -->
<div class="modal fade" id="modal-apple-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="text-uppercase  p-0 m-0">apple Laptop Inventroy</p>

                <p class="text-uppercase mt-2 m-0">In stock apple Laptops:
                    <?php

                        $query = "SELECT inventory_id FROM warehouse_information_sheet WHERE brand = 'apple' AND send_to_production = 0";

                        if ($result = mysqli_query($connection, $query)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        ?><?php echo "$rowcount"; ?>

            </div>
            <div class="modal-body">
                <table id="apple" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Model</th>
                            <th>Processor</th>
                            <th>Core</th>
                            <th>Genaration</th>
                            <th>In Stock</th>
                            <th style="width: 200px;">Location</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark">
                        <?php

                            $query = "SELECT *, COUNT(*) AS No_of_Records FROM warehouse_information_sheet WHERE brand = 'apple' AND send_to_production = 0 GROUP BY model, processor, core, generation, location HAVING COUNT(*) >= 1 ";
                            $query_run = mysqli_query($connection, $query);

                            if ($rowcount = mysqli_num_rows($query_run)) {
                                foreach ($query_run as $items) {

                                    // Return the number of rows in result set

                            ?>
                        <tr>
                            <td>#</td>
                            <td class="text-uppercase"><?= $items['model'] ?></td>
                            <td class="text-uppercase"><?= $items['processor'] ?></td>
                            <td class="text-uppercase"><?= $items['core'] ?></td>
                            <td class="text-uppercase"><?= $items['generation'] ?></td>
                            <td class="text-uppercase"><?php echo $items['No_of_Records']; ?></td>
                            <td class="text-uppercase">
                                <?= $items['location']."-".$items['generation']."-".$items['model'] ?>
                            </td>
                            <td>
                                <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"warehouse_inventory_id_list.php?brand={$items['brand']}&model={$items['model']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                            ?>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- MSI Modal -->
<div class="modal fade" id="modal-msi-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="text-uppercase  p-0 m-0">msi Laptop Inventroy</p>

                <p class="text-uppercase mt-2 m-0">In stock msi Laptops:
                    <?php

                        $query = "SELECT inventory_id FROM warehouse_information_sheet WHERE brand = 'msi' AND send_to_production = 0";

                        if ($result = mysqli_query($connection, $query)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        ?><?php echo "$rowcount"; ?>

            </div>
            <div class="modal-body">
                <table id="msi" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Model</th>
                            <th>Processor</th>
                            <th>Core</th>
                            <th>Genaration</th>
                            <th>In Stock</th>
                            <th style="width: 200px;">Location</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark">
                        <?php

                            $query = "SELECT *, COUNT(*) AS No_of_Records FROM warehouse_information_sheet WHERE brand = 'msi' AND send_to_production = 0 GROUP BY model, processor, core, generation, location HAVING COUNT(*) >= 1 ";
                            $query_run = mysqli_query($connection, $query);

                            if ($rowcount = mysqli_num_rows($query_run)) {
                                foreach ($query_run as $items) {

                                    // Return the number of rows in result set

                            ?>
                        <tr>
                            <td>#</td>
                            <td class="text-uppercase"><?= $items['model'] ?></td>
                            <td class="text-uppercase"><?= $items['processor'] ?></td>
                            <td class="text-uppercase"><?= $items['core'] ?></td>
                            <td class="text-uppercase"><?= $items['generation'] ?></td>
                            <td class="text-uppercase"><?php echo $items['No_of_Records']; ?></td>
                            <td class="text-uppercase">
                                <?= $items['location']."-".$items['generation']."-".$items['model'] ?>
                            </td>
                            <td>
                                <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"warehouse_inventory_id_list.php?brand={$items['brand']}&model={$items['model']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                            ?>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Microsoft Modal -->
<div class="modal fade" id="modal-microsoft-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="text-uppercase  p-0 m-0">microsoft Laptop Inventroy</p>

                <p class="text-uppercase mt-2 m-0">In stock microsoft Laptops:
                    <?php

                        $query = "SELECT inventory_id FROM warehouse_information_sheet WHERE brand = 'microsoft' AND send_to_production = 0";

                        if ($result = mysqli_query($connection, $query)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        ?><?php echo "$rowcount"; ?>

            </div>
            <div class="modal-body">
                <table id="microsoft" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Model</th>
                            <th>Processor</th>
                            <th>Core</th>
                            <th>Genaration</th>
                            <th>In Stock</th>
                            <th style="width: 200px;">Location</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark">
                        <?php

                            $query = "SELECT *, COUNT(*) AS No_of_Records FROM warehouse_information_sheet WHERE brand = 'microsoft' AND send_to_production = 0 GROUP BY model, processor, core, generation, location HAVING COUNT(*) >= 1 ";
                            $query_run = mysqli_query($connection, $query);

                            if ($rowcount = mysqli_num_rows($query_run)) {
                                foreach ($query_run as $items) {

                                    // Return the number of rows in result set

                            ?>
                        <tr>
                            <td>#</td>
                            <td class="text-uppercase"><?= $items['model'] ?></td>
                            <td class="text-uppercase"><?= $items['processor'] ?></td>
                            <td class="text-uppercase"><?= $items['core'] ?></td>
                            <td class="text-uppercase"><?= $items['generation'] ?></td>
                            <td class="text-uppercase"><?php echo $items['No_of_Records']; ?></td>
                            <td class="text-uppercase">
                                <?= $items['location']."-".$items['generation']."-".$items['model'] ?>
                            </td>
                            <td>
                                <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"warehouse_inventory_id_list.php?brand={$items['brand']}&model={$items['model']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                            ?>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Acer Modal -->
<div class="modal fade" id="modal-acer-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="text-uppercase  p-0 m-0">acer Laptop Inventroy</p>

                <p class="text-uppercase mt-2 m-0">In stock acer Laptops:
                    <?php

                        $query = "SELECT inventory_id FROM warehouse_information_sheet WHERE brand = 'acer' AND send_to_production = 0";

                        if ($result = mysqli_query($connection, $query)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        ?><?php echo "$rowcount"; ?>

            </div>
            <div class="modal-body">
                <table id="acer" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Model</th>
                            <th>Processor</th>
                            <th>Core</th>
                            <th>Genaration</th>
                            <th>In Stock</th>
                            <th style="width: 200px;">Location</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark">
                        <?php

                            $query = "SELECT *, COUNT(*) AS No_of_Records FROM warehouse_information_sheet WHERE brand = 'acer' AND send_to_production = 0 GROUP BY model, processor, core, generation, location HAVING COUNT(*) >= 1 ";
                            $query_run = mysqli_query($connection, $query);

                            if ($rowcount = mysqli_num_rows($query_run)) {
                                foreach ($query_run as $items) {

                                    // Return the number of rows in result set

                            ?>
                        <tr>
                            <td>#</td>
                            <td class="text-uppercase"><?= $items['model'] ?></td>
                            <td class="text-uppercase"><?= $items['processor'] ?></td>
                            <td class="text-uppercase"><?= $items['core'] ?></td>
                            <td class="text-uppercase"><?= $items['generation'] ?></td>
                            <td class="text-uppercase"><?php echo $items['No_of_Records']; ?></td>
                            <td class="text-uppercase">
                                <?= $items['location']."-".$items['generation']."-".$items['model'] ?>
                            </td>
                            <td>
                                <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"warehouse_inventory_id_list.php?brand={$items['brand']}&model={$items['model']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                            ?>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Samsung Modal -->
<div class="modal fade" id="modal-samsung-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="text-uppercase  p-0 m-0">samsung Laptop Inventroy</p>

                <p class="text-uppercase mt-2 m-0">In stock samsung Laptops:
                    <?php

                        $query = "SELECT inventory_id FROM warehouse_information_sheet WHERE brand = 'samsung' AND send_to_production = 0";

                        if ($result = mysqli_query($connection, $query)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        ?><?php echo "$rowcount"; ?>

            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Model</th>
                            <th>Processor</th>
                            <th>Core</th>
                            <th>Genaration</th>
                            <th>In Stock</th>
                            <th style="width: 200px;">Location</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark">
                        <?php

                            $query = "SELECT *, COUNT(*) AS No_of_Records FROM warehouse_information_sheet WHERE brand = 'samsung' AND send_to_production = 0 GROUP BY model, processor, core, generation, location HAVING COUNT(*) >= 1 ";
                            $query_run = mysqli_query($connection, $query);

                            if ($rowcount = mysqli_num_rows($query_run)) {
                                foreach ($query_run as $items) {

                                    // Return the number of rows in result set

                            ?>
                        <tr>
                            <td>#</td>
                            <td class="text-uppercase"><?= $items['model'] ?></td>
                            <td class="text-uppercase"><?= $items['processor'] ?></td>
                            <td class="text-uppercase"><?= $items['core'] ?></td>
                            <td class="text-uppercase"><?= $items['generation'] ?></td>
                            <td class="text-uppercase"><?php echo $items['No_of_Records']; ?></td>
                            <td class="text-uppercase">
                                <?= $items['location']."-".$items['generation']."-".$items['model'] ?>
                            </td>
                            <td>
                                <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"warehouse_inventory_id_list.php?brand={$items['brand']}&model={$items['model']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                            ?>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Razer Modal -->
<div class="modal fade" id="modal-razer-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="text-uppercase  p-0 m-0">razer Laptop Inventroy</p>

                <p class="text-uppercase mt-2 m-0">In stock razer Laptops:
                    <?php

                        $query = "SELECT inventory_id FROM warehouse_information_sheet WHERE brand = 'razer' AND send_to_production = 0";

                        if ($result = mysqli_query($connection, $query)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        ?><?php echo "$rowcount"; ?>

            </div>
            <div class="modal-body">
                <table id="razer" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Model</th>
                            <th>Processor</th>
                            <th>Core</th>
                            <th>Genaration</th>
                            <th>In Stock</th>
                            <th style="width: 200px;">Location</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark">
                        <?php

                            $query = "SELECT *, COUNT(*) AS No_of_Records FROM warehouse_information_sheet WHERE brand = 'razer' AND send_to_production = 0 GROUP BY model, processor, core, generation, location HAVING COUNT(*) >= 1 ";
                            $query_run = mysqli_query($connection, $query);

                            if ($rowcount = mysqli_num_rows($query_run)) {
                                foreach ($query_run as $items) {

                                    // Return the number of rows in result set

                            ?>
                        <tr>
                            <td>#</td>
                            <td class="text-uppercase"><?= $items['model'] ?></td>
                            <td class="text-uppercase"><?= $items['processor'] ?></td>
                            <td class="text-uppercase"><?= $items['core'] ?></td>
                            <td class="text-uppercase"><?= $items['generation'] ?></td>
                            <td class="text-uppercase"><?php echo $items['No_of_Records']; ?></td>
                            <td class="text-uppercase">
                                <?= $items['location']."-".$items['generation']."-".$items['model'] ?>
                            </td>
                            <td>
                                <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"warehouse_inventory_id_list.php?brand={$items['brand']}&model={$items['model']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                            ?>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- LG Modal -->
<div class="modal fade" id="modal-lg-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="text-uppercase  p-0 m-0">lg Laptop Inventroy</p>

                <p class="text-uppercase mt-2 m-0">In stock lg Laptops:
                    <?php

                        $query = "SELECT inventory_id FROM warehouse_information_sheet WHERE brand = 'lg' AND send_to_production = 0";

                        if ($result = mysqli_query($connection, $query)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        ?><?php echo "$rowcount"; ?>

            </div>
            <div class="modal-body">
                <table id="lg" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Model</th>
                            <th>Processor</th>
                            <th>Core</th>
                            <th>Genaration</th>
                            <th>In Stock</th>
                            <th style="width: 200px;">Location</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark">
                        <?php

                            $query = "SELECT *, COUNT(*) AS No_of_Records FROM warehouse_information_sheet WHERE brand = 'lg' AND send_to_production = 0 GROUP BY model, processor, core, generation, location HAVING COUNT(*) >= 1 ";
                            $query_run = mysqli_query($connection, $query);

                            if ($rowcount = mysqli_num_rows($query_run)) {
                                foreach ($query_run as $items) {

                                    // Return the number of rows in result set

                            ?>
                        <tr>
                            <td>#</td>
                            <td class="text-uppercase"><?= $items['model'] ?></td>
                            <td class="text-uppercase"><?= $items['processor'] ?></td>
                            <td class="text-uppercase"><?= $items['core'] ?></td>
                            <td class="text-uppercase"><?= $items['generation'] ?></td>
                            <td class="text-uppercase"><?php echo $items['No_of_Records']; ?></td>
                            <td class="text-uppercase">
                                <?= $items['location']."-".$items['generation']."-".$items['model'] ?>
                            </td>
                            <td>
                                <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"warehouse_inventory_id_list.php?brand={$items['brand']}&model={$items['model']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                            ?>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Gigabyte Modal -->
<div class="modal fade" id="modal-gigabyte-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="text-uppercase  p-0 m-0">gigabyte Laptop Inventroy</p>

                <p class="text-uppercase mt-2 m-0">In stock gigabyte Laptops:
                    <?php

                        $query = "SELECT inventory_id FROM warehouse_information_sheet WHERE brand = 'gigabyte' AND send_to_production = 0";

                        if ($result = mysqli_query($connection, $query)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        ?><?php echo "$rowcount"; ?>

            </div>
            <div class="modal-body">
                <table id="gigabyte" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Model</th>
                            <th>Processor</th>
                            <th>Core</th>
                            <th>Genaration</th>
                            <th>In Stock</th>
                            <th style="width: 200px;">Location</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark">
                        <?php

                            $query = "SELECT *, COUNT(*) AS No_of_Records FROM warehouse_information_sheet WHERE brand = 'gigabyte' AND send_to_production = 0 GROUP BY model, processor, core, generation, location HAVING COUNT(*) >= 1 ";
                            $query_run = mysqli_query($connection, $query);

                            if ($rowcount = mysqli_num_rows($query_run)) {
                                foreach ($query_run as $items) {

                            ?>
                        <tr>
                            <td>#</td>
                            <td class="text-uppercase"><?= $items['model'] ?></td>
                            <td class="text-uppercase"><?= $items['processor'] ?></td>
                            <td class="text-uppercase"><?= $items['core'] ?></td>
                            <td class="text-uppercase"><?= $items['generation'] ?></td>
                            <td class="text-uppercase"><?php echo $items['No_of_Records']; ?></td>
                            <td class="text-uppercase">
                                <?= $items['location']."-".$items['generation']."-".$items['model'] ?>
                            </td>
                            <td>
                                <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"warehouse_inventory_id_list.php?brand={$items['brand']}&model={$items['model']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                            ?>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<style>
.modal-header {
    display: block;
}

.modal-content {
    margin-top: 8rem;
}
</style>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>