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
                            <tr>
                                <td>#</td>
                                <td>Dell</td>
                                <td>
                                    <?php
                                    $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'dell'";

                                    if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    echo  $rowcount;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'dell' AND send_to_production = 0";

                                    if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    echo  $rowcount;
                                    ?>
                                </td>
                                <td>120</td>
                                <td class="text-center">
                                    <button class="btn btn-xs bg-primary " data-toggle="modal"
                                        data-target="#modal-dell-xl" href="brand_dell.php"><i class='fas fa-eye'></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#</td>
                                <td>HP</td>
                                <td>
                                    <?php
                                    $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'hp'";

                                    if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    echo  $rowcount;
                                    ?>
                                </td>
                                <td><?php
                                        $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'hp' AND send_to_production = 0";

                                        if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                        }
                                        echo  $rowcount;
                                        ?>
                                </td>
                                <td>120</td>
                                <td class="text-center">
                                    <button class="btn btn-xs bg-primary " data-toggle="modal"
                                        data-target="#modal-hp-xl" href="brand_hp.php"><i class='fas fa-eye'></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#</td>
                                <td>Lenovo</td>
                                <td>
                                    <?php
                                        $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'lenovo'";

                                        if ($result = mysqli_query($connection, $query)) {

                                            // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows($result);
                                        }
                                        echo  $rowcount;
                                        ?>
                                </td>
                                <td>
                                    <?php
                                        $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'lenovo' AND send_to_production = 0";

                                        if ($result = mysqli_query($connection, $query)) {

                                            // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows($result);
                                        }
                                        echo  $rowcount;
                                        ?>
                                </td>
                                <td>120</td>
                                <td class="text-center">
                                    <button class="btn btn-xs bg-primary " data-toggle="modal"
                                        data-target="#modal-lenovo-xl" href="brand_lenovo.php"><i
                                            class='fas fa-eye'></i>
                                    </button>
                                </td>

                            </tr>
                            <tr>
                                <td>#</td>
                                <td>Asus</td>
                                <td>
                                    <?php
                                        $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'asus'";

                                        if ($result = mysqli_query($connection, $query)) {

                                            // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows($result);
                                        }
                                        echo  $rowcount;
                                        ?>
                                </td>
                                <td>
                                    <?php
                                        $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'asus' AND send_to_production = 0";

                                        if ($result = mysqli_query($connection, $query)) {

                                            // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows($result);
                                        }
                                        echo  $rowcount;
                                        ?>
                                </td>
                                <td>120</td>
                                <td class="text-center">
                                    <button class="btn btn-xs bg-primary " data-toggle="modal"
                                        data-target="#modal-asus-xl" href="brand_asus.php"><i class='fas fa-eye'></i>
                                    </button>
                                </td>

                            </tr>
                            <tr>
                                <td>#</td>
                                <td>Fujitsu</td>
                                <td>
                                    <?php
                                    $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'fujitsu'";

                                    if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    echo  $rowcount;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'fujitsu' AND send_to_production = 0";

                                    if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    echo  $rowcount;
                                    ?>
                                </td>
                                <td>100</td>
                                <td class="text-center">
                                    <button class="btn btn-xs bg-primary " data-toggle="modal"
                                        data-target="#modal-fujitsu-xl" href="brand_fujitsu.php"><i
                                            class='fas fa-eye'></i>
                                    </button>
                                </td>

                            </tr>
                            <tr>
                                <td>#</td>
                                <td>Apple</td>
                                <td>
                                    <?php
                                    $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'apple' ";

                                    if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    echo  $rowcount;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'apple' AND send_to_production = 0";

                                    if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    echo  $rowcount;
                                    ?>
                                </td>
                                <td>100</td>
                                <td class="text-center">
                                    <button class="btn btn-xs bg-primary " data-toggle="modal"
                                        data-target="#modal-apple-xl" href="brand_apple.php"><i class='fas fa-eye'></i>
                                    </button>
                                </td>

                            </tr>
                            <tr>
                                <td>#</td>
                                <td>MSI</td>
                                <td>
                                    <?php
                                    $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'msi'";

                                    if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    echo  $rowcount;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'msi' AND send_to_production = 0";

                                    if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    echo  $rowcount;
                                    ?>
                                </td>
                                <td>120</td>
                                <td class="text-center">
                                    <button class="btn btn-xs bg-primary " data-toggle="modal"
                                        data-target="#modal-msi-xl" href="brand_msi.php"><i class='fas fa-eye'></i>
                                    </button>
                                </td>

                            </tr>
                            <tr>
                                <td>#</td>
                                <td>Microsoft</td>
                                <td>
                                    <?php
                                        $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'microsoft' ";

                                        if ($result = mysqli_query($connection, $query)) {

                                            // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows($result);
                                        }
                                        echo  $rowcount;
                                        ?>
                                </td>
                                <td>
                                    <?php
                                        $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'microsoft' AND send_to_production = 0";

                                        if ($result = mysqli_query($connection, $query)) {

                                            // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows($result);
                                        }
                                        echo  $rowcount;
                                        ?>
                                </td>
                                <td>120</td>
                                <td class="text-center">
                                    <button class="btn btn-xs bg-primary " data-toggle="modal"
                                        data-target="#modal-microsoft-xl" href="brand_microsoft.php"><i
                                            class='fas fa-eye'></i>
                                    </button>
                                </td>

                            </tr>
                            <tr>
                                <td>#</td>
                                <td>Acer</td>
                                <td>
                                    <?php
                                    $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'acer'";

                                    if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    echo  $rowcount;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'acer' AND send_to_production = 0";

                                    if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    echo  $rowcount;
                                    ?>
                                </td>
                                <td>120</td>
                                <td class="text-center">
                                    <button class="btn btn-xs bg-primary " data-toggle="modal"
                                        data-target="#modal-acer-xl" href="brand_acer.php"><i class='fas fa-eye'></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#</td>
                                <td>Samsung</td>
                                <td>
                                    <?php
                                    $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'samsung' ";

                                    if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    echo  $rowcount;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'samsung' AND send_to_production = 0";

                                    if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    echo  $rowcount;
                                    ?>
                                </td>
                                <td>100</td>
                                <td class="text-center">
                                    <button class="btn btn-xs bg-primary " data-toggle="modal"
                                        data-target="#modal-samsung-xl" href="brand_samsung.php"><i
                                            class='fas fa-eye'></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#</td>
                                <td>Razer</td>
                                <td>
                                    <?php
                                    $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'razer' ";

                                    if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    echo  $rowcount;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'razer' AND send_to_production = 0";

                                    if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    echo  $rowcount;
                                    ?>
                                </td>
                                <td>100</td>
                                <td class="text-center">
                                    <button class="btn btn-xs bg-primary " data-toggle="modal"
                                        data-target="#modal-razer-xl" href="brand_razer.php"><i class='fas fa-eye'></i>
                                    </button>
                                </td>

                            </tr>
                            <tr>
                                <td>#</td>
                                <td>LG</td>
                                <td>
                                    <?php
                                    $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'lg' ";

                                    if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    echo  $rowcount;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'lg' AND send_to_production = 0";

                                    if ($result = mysqli_query($connection, $query)) {

                                        // Return the number of rows in result set
                                        $rowcount = mysqli_num_rows($result);
                                    }
                                    echo  $rowcount;
                                    ?>
                                </td>
                                <td>100</td>
                                <td class="text-center">
                                    <button class="btn btn-xs bg-primary " data-toggle="modal"
                                        data-target="#modal-lg-xl" href="brand_lg.php"><i class='fas fa-eye'></i>
                                    </button>
                                </td>

                            </tr>
                            <tr>
                                <td>#</td>
                                <td>Gigabyte</td>
                                <td>
                                    <?php
                                        $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'gigabyte'";

                                        if ($result = mysqli_query($connection, $query)) {

                                            // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows($result);
                                        }
                                        echo  $rowcount;
                                        ?>
                                </td>
                                <td>
                                    <?php
                                        $query = "SELECT brand FROM warehouse_information_sheet WHERE brand  = 'gigabyte' AND send_to_production = 0";

                                        if ($result = mysqli_query($connection, $query)) {

                                            // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows($result);
                                        }
                                        echo  $rowcount;
                                        ?>
                                </td>
                                <td>100</td>
                                <td class="text-center">
                                    <button class="btn btn-xs bg-primary " data-toggle="modal"
                                        data-target="#modal-gigabyte-xl" href="brand_gigabyte.php"><i
                                            class='fas fa-eye'></i>
                                    </button>
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