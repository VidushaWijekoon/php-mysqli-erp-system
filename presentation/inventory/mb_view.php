<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
$q = $_GET['q'];

?>
<style>
    table tr{
        padding:20px;
        text-align:center;
    }
    </style>
<div >
    <div class="row">
        <div
            class="col-lg-10 grid-margin stretch-card justify-content-center align-item-center mx-auto mt-2 text-uppercase">
            <div class="card mt-3">
                <?php
                if($q==0){
                    ?>
                     <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Received List</p>
                </div>
                    <?php
                    }elseif($q==1){
                        ?>
                        <div class="card-header bg-secondary">
                       <p class="text-uppercase m-0 p-0">Completed Motherboard Issue List (Not Received)</p>
                   </div>
                       <?php
                        }elseif($q==2){
                            ?>
                     <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Remaining Motherboard Issue List</p>
                </div>
                    <?php
                            }
                ?>
               <table  class="col-lg-12 grid-margin stretch-card justify-content-center align-item-center mx-auto mt-3 text-uppercase">
                <thead>
                    <th>Inventory Id</th>
                    <th>Model</th>
                    <th>Core</th>
                    <th>Generation</th>
                    <th>Sent Date</th>
                    <th>Status</th>
                    <th>Received Date</th>
                </thead>
                <tbody>
                    <?php
                    if($q==0){
                    $sql="SELECT alsakb_qr,created_date,received_date,status,model,generation,core  FROM issue_laptops LEFT JOIN 
                    warehouse_information_sheet ON warehouse_information_sheet.inventory_id=issue_laptops.alsakb_qr WHERE issue_type2='1' AND mb_received='1'";
                     $query_run = mysqli_query($connection, $sql);
                    }elseif($q==1){
                        $sql="SELECT alsakb_qr,created_date,received_date,status,model,generation,core  FROM issue_laptops LEFT JOIN 
                        warehouse_information_sheet ON warehouse_information_sheet.inventory_id=issue_laptops.alsakb_qr WHERE issue_type2='1' AND status='2'";
                         $query_run = mysqli_query($connection, $sql);
                    }elseif($q==2){
                        $sql="SELECT alsakb_qr,created_date,received_date,status,model,generation,core  FROM issue_laptops LEFT JOIN 
                        warehouse_information_sheet ON warehouse_information_sheet.inventory_id=issue_laptops.alsakb_qr WHERE issue_type2='1' AND status='1'";
                         $query_run = mysqli_query($connection, $sql);
                    }else{
                        $sql="SELECT alsakb_qr,created_date,received_date,status,model,generation,core  FROM issue_laptops LEFT JOIN 
                        warehouse_information_sheet ON warehouse_information_sheet.inventory_id=issue_laptops.alsakb_qr WHERE issue_type2='1' AND model like '%$q%' ";
                         $query_run = mysqli_query($connection, $sql);
                    }
                     foreach($query_run as $data){
                        if($data['status']==1){
                        $status="Not Started";
                        }elseif($data['status']==2){
                            $status="Completed";
                            }
                    ?>
                    <tr>
                    <td><?php echo $data['alsakb_qr']?></td>
                    <td><?php echo $data['model']?></td>
                    <td><?php echo $data['core']?></td>
                    <td><?php echo $data['generation']?></td>
                    <td><?php echo $data['created_date']?></td>
                    <td><?php echo  $status ?></td>
                    <td><?php echo $data['received_date']?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
