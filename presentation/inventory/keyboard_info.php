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
$pallet=0;
$pallet=$_GET['id'];
?>
<div class="row">
    <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
        <div class="card mt-3">
            <div class="card-header d-flex bg-secondary">
                <div class="mr-auto">
                    <div class="text-center mx-auto mt-1 text-uppercase" style="font-size: 14px;">
                        Keyboard
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table  class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Pallet No</th>
                            <th>Brand</th>
                            <th>QTY</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query="SELECT pallet_id,brand,SUM(qty)as qty FROM pallet_informations WHERE pallet_id='$pallet' AND category='Keyboard' GROUP BY brand ORDER BY qty DESC";
                        $query_run = mysqli_query($connection, $query);
                        foreach($query_run as $data){
                            $id=$data['pallet_id'];
                            $qty=$data['qty'];
                            $brand=$data['brand'];
                            echo "<tr>";
                            echo"<td>$id</td>";
                            echo"<td>$brand</td>";
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