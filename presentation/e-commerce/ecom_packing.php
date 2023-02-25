<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../includes/header.php');



// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$username = $_SESSION['username'];

?>
<style>
    .packingHeadingSec{
        display: flex;
        justify-content: space-between;
        padding: 20px 30px;
    }

    .packingHeading{
        font-size: 30px;
        font-weight: 700;
    }

    .wholeSalePackingBtn{

    }
    .packingContentSec{
        border: #f8f9fa 1px;
        border-radius: 5px;
        padding: 10px;
        background-color: #fff;
        box-shadow:0 5px 25px hsl(0deg 0% 78% / 30%);
    }

    .tabPanal{
        display: flex;
        justify-content: space-between;
    }

    .packingTable{
        padding: 0px 10px;
    }

    .packingTable th{
        color: #168eb4;
    }

    .tableSec1{
        height: 500px;
        overflow-y: auto;
        overflow-x: auto;
    }

</style>

<div class="packingBody">
    <div class="row packingHeadingSec">
        <div class="packingHeading">
            <p>E-Commerce Packing</p>
        </div>
        <div class="wholeSalePackingBtn">
                hdjshfkjh
        </div>
    </div>

    <div class="packingContentSec">
        <div class="">

        <div class="packingListTableSec">

            <div class="packingTableHeading">
                <h5>Your Packing jobs</h5>
            </div>
            <div class="startPackingBtn">
                <a href="./ecom_packing_start.php">
                    <div class="btn btn-success">Start Packing</div>
                </a>
            </div>
        <br>

        <div class="packingTable">

            <!-- tab section -->

            <div class="row tabPanal">
                    <div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <div class="nav-link active text-danger" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                    <span style="color: #AFAFAF; font-weight: 700;">ALL</span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                <span style="color: #AFAFAF; font-weight: 700">Open</span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                <span style="color: #AFAFAF; font-weight: 700">Closed</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    

                    <div class="filterSec" >
                        
                            <!-- <select class="DropDown" name="" id="">
                            <option selected value="">Filter By Status</option>
                            <option value="order_create">Order Create</option>                                                                      
                            <option value="processsing">Processing</option>                                                                      
                            <option value="qc">QC</option>                                                                      
                            <option value="packing">Packing</option>                                                                      
                            <option value="delivery">Delivery</option>                                                                      
                            </select> -->
                        
                    </div>
                </div>

                <!-- Body Section -->

                <div class="tab-content tableSec1" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table table-hover text-center">
                            <thead style="background-color: #fff;">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sales Order </th> 
                                <th scope="col">Order Number</th> 
                                <th scope="col">Customer</th>
                                <th scope="col">Order Type</th>
                                <th scope="col">Order Details</th>
                                <!-- <th scope="col">Inventory Type</th>                        -->
                                <th scope="col">Qty</th>
                                <th scope="col">Packed Qty</th>
                                <th scope="col">Created By</th>
                                
                                <!-- <th scope="col">Price</th> -->
                                <!-- <th scope="col">Status</th> -->
                                <th scope="col">Created Date</th>
                                <th scope="col">DeadLine Date</th>
                                <th scope="col">Remaining Time</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="color:black">1</th>
                                    <td><a href="./ecom_orderdetail_list.php" style="color:black;">ALSk1234</a></td>
                                    <td>S51231sD</td>
                                    <td>Noon</td>
                                    <td>FBN</td>
                                    <td>Thinkpad T460  </td>
                                    <!-- <td>E-Commerce</td>                            -->
                                    <td>10</td>
                                    <td>5</td>
                                    <td>Sales Person 1</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>10 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">2</th>
                                    <td><a href="./ecom_orderdetail_list.php" style="color:black;">ALSk1234</a></td>
                                    <td>S51231sD</td>
                                    <td>Amazon</td>
                                    <td>FBA</td>
                                    <td>Latitude e5240</td>
                                    <!-- <td>E-Commerce</td>                            -->
                                    <td>10</td>
                                    <td>0</td>
                                    <td>Sales Person 2</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>14 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">2</th>
                                    <td><a href="./ecom_orderdetail_list.php" style="color:black;">ALSk1234</a></td>
                                    <td>S51231sD</td>
                                    <td>Amazon</td>
                                    <td>FBA</td>
                                    <td>Latitude e5240</td>
                                    <!-- <td>E-Commerce</td>                            -->
                                    <td>10</td>
                                    <td>0</td>
                                    <td>Sales Person 2</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>14 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">2</th>
                                    <td><a href="./ecom_orderdetail_list.php" style="color:black;">ALSk1234</a></td>
                                    <td>S51231sD</td>
                                    <td>Amazon</td>
                                    <td>FBA</td>
                                    <td>Latitude e5240</td>
                                    <!-- <td>E-Commerce</td>                            -->
                                    <td>10</td>
                                    <td>0</td>
                                    <td>Sales Person 2</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>14 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">2</th>
                                    <td><a href="./ecom_orderdetail_list.php" style="color:black;">ALSk1234</a></td>
                                    <td>S51231sD</td>
                                    <td>Amazon</td>
                                    <td>FBA</td>
                                    <td>Latitude e5240</td>
                                    <!-- <td>E-Commerce</td>                            -->
                                    <td>10</td>
                                    <td>0</td>
                                    <td>Sales Person 2</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>14 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">2</th>
                                    <td><a href="./ecom_orderdetail_list.php" style="color:black;">ALSk1234</a></td>
                                    <td>S51231sD</td>
                                    <td>Amazon</td>
                                    <td>FBA</td>
                                    <td>Latitude e5240</td>
                                    <!-- <td>E-Commerce</td>                            -->
                                    <td>10</td>
                                    <td>0</td>
                                    <td>Sales Person 2</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>14 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">2</th>
                                    <td><a href="./ecom_orderdetail_list.php" style="color:black;">ALSk1234</a></td>
                                    <td>S51231sD</td>
                                    <td>Amazon</td>
                                    <td>FBA</td>
                                    <td>Latitude e5240</td>
                                    <!-- <td>E-Commerce</td>                            -->
                                    <td>10</td>
                                    <td>0</td>
                                    <td>Sales Person 2</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>14 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">2</th>
                                    <td><a href="./ecom_orderdetail_list.php" style="color:black;">ALSk1234</a></td>
                                    <td>S51231sD</td>
                                    <td>Amazon</td>
                                    <td>FBA</td>
                                    <td>Latitude e5240</td>
                                    <!-- <td>E-Commerce</td>                            -->
                                    <td>10</td>
                                    <td>0</td>
                                    <td>Sales Person 2</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>14 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">2</th>
                                    <td><a href="./ecom_orderdetail_list.php" style="color:black;">ALSk1234</a></td>
                                    <td>S51231sD</td>
                                    <td>Amazon</td>
                                    <td>FBA</td>
                                    <td>Latitude e5240</td>
                                    <!-- <td>E-Commerce</td>                            -->
                                    <td>10</td>
                                    <td>0</td>
                                    <td>Sales Person 2</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>14 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">2</th>
                                    <td><a href="./ecom_orderdetail_list.php" style="color:black;">ALSk1234</a></td>
                                    <td>S51231sD</td>
                                    <td>Amazon</td>
                                    <td>FBA</td>
                                    <td>Latitude e5240</td>
                                    <!-- <td>E-Commerce</td>                            -->
                                    <td>10</td>
                                    <td>0</td>
                                    <td>Sales Person 2</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>14 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">2</th>
                                    <td><a href="./ecom_orderdetail_list.php" style="color:black;">ALSk1234</a></td>
                                    <td>S51231sD</td>
                                    <td>Amazon</td>
                                    <td>FBA</td>
                                    <td>Latitude e5240</td>
                                    <!-- <td>E-Commerce</td>                            -->
                                    <td>10</td>
                                    <td>0</td>
                                    <td>Sales Person 2</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>14 Hrs</td>
                                </tr>
                                
                                
                            </tbody>
                            </table>               




                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-hover text-center">
                            <thead style="background-color: #fff;">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sales Order </th> 
                                <th scope="col">Order Number</th> 
                                <th scope="col">Customer</th>
                                <th scope="col">Order Type</th>
                                <th scope="col">Order Details</th>
                                <!-- <th scope="col">Inventory Type</th>                        -->
                                <th scope="col">Qty</th>
                                <th scope="col">Packed Qty</th>
                                <th scope="col">Created By</th>
                                
                                <!-- <th scope="col">Price</th> -->
                                <!-- <th scope="col">Status</th> -->
                                <th scope="col">Created Date</th>
                                <th scope="col">DeadLine Date</th>
                                <th scope="col">Remaining Time</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="color:black">1</th>
                                    <td><a href="./ecom_orderdetail_list.php" style="color:black;">ALSk1234</a></td>
                                    <td>S51231sD</td>
                                    <td>Noon</td>
                                    <td>FBN</td>
                                    <td>Thinkpad T460  </td>
                                    <!-- <td>E-Commerce</td>                            -->
                                    <td>10</td>
                                    <td>5</td>
                                    <td>Sales Person 1</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>10 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">2</th>
                                    <td><a href="./ecom_orderdetail_list.php" style="color:black;">ALSk1234</a></td>
                                    <td>S51231sD</td>
                                    <td>Amazon</td>
                                    <td>FBA</td>
                                    <td>Latitude e5240</td>
                                    <!-- <td>E-Commerce</td>                            -->
                                    <td>10</td>
                                    <td>0</td>
                                    <td>Sales Person 2</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>14 Hrs</td>
                                </tr>
                                
                                
                            </tbody>
                            </table>              
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <table class="table table-hover text-center">
                            <thead style="background-color: #fff;">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sales Order </th> 
                                <th scope="col">Order Number</th> 
                                <th scope="col">Customer</th>
                                <th scope="col">Order Type</th>
                                <th scope="col">Order Details</th>
                                <!-- <th scope="col">Inventory Type</th>                        -->
                                <th scope="col">Qty</th>
                                <th scope="col">Packed Qty</th>
                                <th scope="col">Created By</th>
                                
                                <!-- <th scope="col">Price</th> -->
                                <!-- <th scope="col">Status</th> -->
                                <th scope="col">Created Date</th>
                                <th scope="col">DeadLine Date</th>
                                <th scope="col">Remaining Time</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="color:black">1</th>
                                    <td><a href="./ecom_orderdetail_list.php" style="color:black;">ALSk1234</a></td>
                                    <td>S51231sD</td>
                                    <td>Noon</td>
                                    <td>FBN</td>
                                    <td>Thinkpad T460  </td>
                                    <!-- <td>E-Commerce</td>                            -->
                                    <td>10</td>
                                    <td>5</td>
                                    <td>Sales Person 1</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>10 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">2</th>
                                    <td><a href="./ecom_orderdetail_list.php" style="color:black;">ALSk1234</a></td>
                                    <td>S51231sD</td>
                                    <td>Amazon</td>
                                    <td>FBA</td>
                                    <td>Latitude e5240</td>
                                    <!-- <td>E-Commerce</td>                            -->
                                    <td>10</td>
                                    <td>0</td>
                                    <td>Sales Person 2</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>14 Hrs</td>
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




<?php include_once('../includes/footer.php'); ?>