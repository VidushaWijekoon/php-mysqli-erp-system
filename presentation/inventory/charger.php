<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center d-flex">
        <a href="./warehouse_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
        <h3 class="mt-2">Charger Inventory</h3>
    </div>
</div>
<div class="row m-2">
    <div class="col-12 mt-3">
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="other_inventory.php"><i
                class="fa-solid fa-layer-plus"></i><span class="mx-1">Monitor </span></a>
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="desktop.php"><i
                class="fa-solid fa-layer-plus"></i><span class="mx-1">Desktop </span></a>
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="keyboard.php"><i
                class="fa-solid fa-layer-plus"></i><span class="mx-1">Keyboard </span></a>
                <a class="btn bg-gradient-info mx-2 text-white" type="button" href="mouse.php"><i
                class="fa-solid fa-layer-plus"></i><span class="mx-1">Mouse </span></a>
    </div>
</div>
<div class="row">
    <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
        <div class="card mt-3">
            <div class="card-header d-flex bg-secondary">
                <div class="mr-auto">
                    <div class="text-center mx-auto mt-1 text-uppercase" style="font-size: 14px;">
                        Charger
                    </div>
                </div>
            </div>
            <div class="row m-2">
    <div class="col-12 mt-3">
            <a href="mix.php?type=Charger" class="btn btn-sm btn-success">Download  Excel
                file</a>
</div>
</div>
            <div class="card-body">
                <table  class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Pallet No</th>
                            <th>QTY</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query="SELECT pallet_id,SUM(qty)as qty FROM pallet_informations WHERE category='Charger' GROUP BY pallet_id ORDER BY pallet_id ASC";
                        $query_run = mysqli_query($connection, $query);
                        foreach($query_run as $data){
                            $id=$data['pallet_id'];
                            $qty=$data['qty'];
                            echo "<tr>";
                            ?>
                            <td><a href='charger_info.php?id=<?php echo $id ?>'><?php echo $id ?></a></td>
                            <?php
                            echo"<td>$qty</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>

                </table>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<?php include_once '../includes/footer.php';?>