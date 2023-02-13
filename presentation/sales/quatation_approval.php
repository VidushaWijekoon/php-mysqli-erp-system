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

$username = $_SESSION['username'];

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-5">
            <div class="card card-primary card-outline card-outline-tabs m-2 w-100">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <!-- <li class="nav-item text-center" style="width: 150px;">
                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                aria-selected="true" style="color: #fff;">Sales Orders</a>
                        </li> -->
                        <li class="nav-item text-center" style="width: 150px;">
                            <a class="nav-link active" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                aria-selected="false" style="color: #fff;">Orders</a>
                        </li>
                    </ul>
                </div>
                <div class=" card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <!-- ============================================================== -->
                        <!-- Sales Order  -->
                        <!-- ============================================================== -->
                        <!-- <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                            aria-labelledby="custom-tabs-four-home-tab">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Customer Name</th>
                                        <th>Country</th>
                                        <th>Invoice No</th>
                                        <th>Sales Order</th>
                                        <th>Order Status</th>
                                        <th>Shipment Date</th>
                                        <th>Sales Person</th>
                                        <th>Payment</th>
                                        <th>Packed</th>
                                        <th>Amount</th>
                                        <th>Delivery Method</th>
                                        <th>Shipping</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01/01/2023</td>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>IN-0001</td>
                                        <td>SO-0001</td>
                                        <td>Confirmed</td>
                                        <td>01/25/2022</td>
                                        <td>Riskan</td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td>$1000</td>
                                        <td><a href="./quatation_view.php">SO1037</a></td>
                                        <td>
                                            <span>
                                                <i class="fa-solid fa-circle mx-1" style="color: #28a745;"></i>
                                            </span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>01/01/2023</td>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>IN-0001</td>
                                        <td>SO-0001</td>
                                        <td>Confirmed</td>
                                        <td>01/25/2022</td>
                                        <td>Riskan</td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td>$1000</td>
                                        <td><a href="./quatation_view.php">SO1037</a></td>
                                        <td>
                                            <span>
                                                <i class="fa-solid fa-circle mx-1" style="color: #dc3545;"></i>
                                            </span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>01/01/2023</td>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>IN-0001</td>
                                        <td>SO-0001</td>
                                        <td>Confirmed</td>
                                        <td>01/25/2022</td>
                                        <td>Riskan</td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td>$1000</td>
                                        <td><a href="./quatation_view.php">SO1037</a></td>
                                        <td>
                                            <span>
                                                <i class="fa-solid fa-circle mx-1" style="color: #17a2b8;"></i>
                                            </span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>01/01/2023</td>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>IN-0001</td>
                                        <td>SO-0001</td>
                                        <td>Confirmed</td>
                                        <td>01/25/2022</td>
                                        <td>Riskan</td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td>$1000</td>
                                        <td><a href="./quatation_view.php">SO1037</a></td>
                                        <td>
                                            <span>
                                                <i class="fa-solid fa-circle mx-1" style="color: #28a745;"></i>
                                            </span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>01/01/2023</td>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>IN-0001</td>
                                        <td>SO-0001</td>
                                        <td>Confirmed</td>
                                        <td>01/25/2022</td>
                                        <td>Riskan</td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td>$1000</td>
                                        <td><a href="./quatation_view.php">SO1037</a></td>
                                        <td>
                                            <span>
                                                <i class="fa-solid fa-circle mx-1" style="color: #ffc107;"></i>
                                            </span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>01/01/2023</td>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>IN-0001</td>
                                        <td>SO-0001</td>
                                        <td>Confirmed</td>
                                        <td>01/25/2022</td>
                                        <td>Riskan</td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td>$1000</td>
                                        <td><a href="./quatation_view.php">SO1037</a></td>
                                        <td>
                                            <span>
                                                <i class="fa-solid fa-circle mx-1" style="color: #28a745;">
                                                </i>
                                            </span>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex">

                                <div class="float-end ml-auto mt-auto">
                                    <span>
                                        <i class="fa-solid fa-circle mx-1" style="color: #28a745;"></i>Dispatched
                                    </span>
                                    <span>
                                        <i class="fa-solid fa-circle mx-1" style="color: #dc3545;"></i>Delivered
                                    </span>
                                    <span>
                                        <i class="fa-solid fa-circle mx-1" style="color: #17a2b8;"></i>Shipped
                                    </span>
                                    <span>
                                        <i class="fa-solid fa-circle mx-1" style="color: #ff006f;"></i>Advance Paid
                                    </span>
                                    <span>
                                        <i class="fa-solid fa-circle mx-1" style="color: #007bff;"></i>Fully Paid
                                    </span>
                                    <span>
                                        <i class="fa-solid fa-circle mx-1" style="color: #6c757d;"></i>Pending
                                    </span>
                                    <span>
                                        <i class="fa-solid fa-circle mx-1" style="color: #ffc107;"></i>Packing
                                    </span>

                                </div>
                            </div>
                        </div> -->

                        <!-- ============================================================== -->
                        <!-- Quatation  -->
                        <!-- ============================================================== -->
                        <div class="tab-pane fade show active" id="custom-tabs-four-profile" role="tabpanel"
                            aria-labelledby="custom-tabs-four-profile-tab">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Order Number</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Country</th>
                                            <th scope="col">Shipping Type</th>
                                            <th scope="col">Order Type</th>
                                            <th scope="col">Created By</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Created Date</th>
                                            <th scope="col">Deadline Date</th>
                                            <th scope="col">Remaining Time</th>
                                            <th scope="col">Approved By</th>
                                            <th scope="col">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                            $i = 0;
                                                
                                            $query = "SELECT first_name, last_name, country, sales_quatation_items.created_by, sales_customer_information.customer_id, quatation_id, 
                                                            sales_quatation_items.status, approval, qty, total, approved_by, sales_quatation_items.created_time, shipping_date  
                                                FROM sales_customer_information 
                                                INNER JOIN sales_quatation_items ON sales_customer_information.customer_id = sales_quatation_items.customer_id
                                                WHERE sales_quatation_items.created_by = '$username' GROUP BY quatation_id ORDER BY quatation_id DESC";                                           
                                                    
                                            $query_run = mysqli_query($connection, $query);
                                            foreach($query_run as $row){
                                                $customer_first_name = $row['first_name'];
                                                $customer_last_name = $row['last_name'];
                                                $country = $row['country'];
                                                $created_by = $row['created_by'];
                                                $quatation_id = $row['quatation_id'];
                                                $item_status = $row['status'];
                                                $approved = $row['approval'];
                                                $approved_by = $row['approved_by'];
                                                $qty = $row['qty'];
                                                $total = $row['total'];
                                                $created_time = $row['created_time'];
                                                $created_time = Date('Y-m-d');
                                                $shipping_date = $row['shipping_date'];

                                                $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                                <?php                                             
                                                    echo "<a href='./quatation_view.php?quatation_id={$row['quatation_id']}&customer_id={$row['customer_id']}'>
                                                            QA-$quatation_id</a>";                                                
                                                ?>
                                            </td>
                                            <td><?php echo $customer_first_name . " " . $customer_last_name ?></td>
                                            <td><?php echo $country; ?></td>
                                            <td></td>
                                            <td></td>
                                            <td><?php echo $created_by; ?></td>
                                            <td><?php echo $qty ?></td>
                                            <td><?php echo $total ?></td>
                                            <td></td>
                                            <td><?php echo $created_time ?></td>
                                            <td><?php echo $shipping_date ?></td>
                                            <td></td>
                                            <td>
                                                <?php if($item_status == 0 && $approved == 0) { ?>
                                                <span class="badge badge-lg badge-warning text-white p-1 px-3">Waiting
                                                    for Approve</span>
                                                <?php } if($item_status == 1 && $approved == 1){ ?>
                                                <span class="badge badge-lg badge-success text-white p-1 px-3">Approved
                                                    <?php echo $approved_by ?></span>
                                                <?php } ?>
                                            </td>
                                            <td></td>
                                            <?php } ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once('../includes/footer.php'); ?>