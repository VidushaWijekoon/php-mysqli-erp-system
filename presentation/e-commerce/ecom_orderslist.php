<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

?>

<style>

    a{
        text-decoration: none !important;
        text-decoration-color: green !important;
    }
    .orderListHeadingSec{
        display: flex;
        justify-content: space-between;
        padding: 20px 30px;
    }
    .orderHeading p{
        font-size: 30px;
        font-weight: 700;
    }

    .orderTable{
        height: 250px;
        padding: 20px;
        background-color: #fff;
    }
    .orderTable th{
        color: #168eb4;
    }

    .tabPanal{
        display: flex;
        justify-content: space-between;
    }

    .status{
        color: red;
    }

    .filterSec{
        margin-right: 30px;

    }
    .DropDown{
        height: 30px;
        width: 100%;
        border-radius: 5px;
        border: 1px solid #f1f1f1;
        /* padding: 0px 10px; */
    }

    .searchBar{
        font-size: 20px;
    }
    .searchBar input{
        height:30px;
    }

    .tableSec1{
        height: 500px;
        overflow-y: auto;
        overflow-x: auto;
    }





</style>

<div class="orderListBody">

    <div class="row orderListHeadingSec">
        <div class="orderHeading">
            <p>Orders</p>
        </div>
        <div class="searchSec">
            
            <div class="searchBar">
                <label class=""> Search </label> <input type="text" placeholder="Search"><i class="mx-3 fa-solid fa-magnifying-glass"></i>
            </div>
        </div>

    </div>

    <div class="orderListTableSec">

        <div class="orderTable">

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
                    
                        <select class="DropDown" name="" id="">
                        <option selected value="">Filter By Status</option>
                        <option value="order_create">Order Create</option>                                                                      
                        <option value="processsing">Processing</option>                                                                      
                        <option value="qc">QC</option>                                                                      
                        <option value="packing">Packing</option>                                                                      
                        <option value="delivery">Delivery</option>                                                                      
                        </select>
                    
                </div>

            </div>

                <!-- Body Section -->

                <div class="tab-content tableSec1" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table table-hover text-center">
                            <thead style="background-color: #fff;">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sales Order Number</th> 
                                <th scope="col">Order Number</th> 
                                <th scope="col">Customer</th>
                                <th scope="col">Order Type</th>
                                <th scope="col">Order Details</th>
                                <th scope="col">Inventory Type</th>                       
                                <th scope="col">Created By</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
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
                                    <td>E-Commerce</td>                           
                                    <td>Sales Person 1</td>
                                    <td>10</td>
                                    <td>1000 <span style="font-size: smaller;">(AED)</span></td>
                                    <td class="status"><a href="./machine_status_view.php" style="color:green"> Processing</td></a>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>10 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">2</th>
                                    <td>ALSk1234</td>
                                    <td>S51231sD</td>
                                    <td>Thinkpad T460 </td>
                                    <td>Noon</td>
                                    <td>FBN</td>
                                    <td>Sales Person 1</td>
                                    <td>10</td>
                                    <td>1000 <span style="font-size: smaller;">(AED)</span></td>
                                    <td class="" style="color: green;">Completed</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>10 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">3</th>
                                    <td>ALSk1234</td>
                                    <td>S51231sD</td>               
                                    <td>Thinkpad T460 </td>
                                    <td>Noon</td>
                                    <td>FBN</td>
                                    <td>Sales Person 1</td>
                                    <td>10</td>
                                    <td>1000 <span style="font-size: smaller;">(AED)</span></td>
                                    <td class="status" style="color:green;">QC</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>10 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">3</th>
                                    <td>ALSk1234</td>
                                    <td>S51231sD</td>               
                                    <td>Thinkpad T460 </td>
                                    <td>Noon</td>
                                    <td>FBN</td>
                                    <td>Sales Person 1</td>
                                    <td>10</td>
                                    <td>1000 <span style="font-size: smaller;">(AED)</span></td>
                                    <td class="status" style="color:green;">QC</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>10 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">3</th>
                                    <td>ALSk1234</td>
                                    <td>S51231sD</td>               
                                    <td>Thinkpad T460 </td>
                                    <td>Noon</td>
                                    <td>FBN</td>
                                    <td>Sales Person 1</td>
                                    <td>10</td>
                                    <td>1000 <span style="font-size: smaller;">(AED)</span></td>
                                    <td class="status" style="color:green;">QC</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>10 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">3</th>
                                    <td>ALSk1234</td>
                                    <td>S51231sD</td>               
                                    <td>Thinkpad T460 </td>
                                    <td>Noon</td>
                                    <td>FBN</td>
                                    <td>Sales Person 1</td>
                                    <td>10</td>
                                    <td>1000 <span style="font-size: smaller;">(AED)</span></td>
                                    <td class="status" style="color:green;">QC</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>10 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">3</th>
                                    <td>ALSk1234</td>
                                    <td>S51231sD</td>               
                                    <td>Thinkpad T460 </td>
                                    <td>Noon</td>
                                    <td>FBN</td>
                                    <td>Sales Person 1</td>
                                    <td>10</td>
                                    <td>1000 <span style="font-size: smaller;">(AED)</span></td>
                                    <td class="status" style="color:green;">QC</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>10 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">3</th>
                                    <td>ALSk1234</td>
                                    <td>S51231sD</td>               
                                    <td>Thinkpad T460 </td>
                                    <td>Noon</td>
                                    <td>FBN</td>
                                    <td>Sales Person 1</td>
                                    <td>10</td>
                                    <td>1000 <span style="font-size: smaller;">(AED)</span></td>
                                    <td class="status" style="color:green;">QC</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>10 Hrs</td>
                                </tr>
                                <tr>
                                    <th style="color:black">3</th>
                                    <td>ALSk1234</td>
                                    <td>S51231sD</td>               
                                    <td>Thinkpad T460 </td>
                                    <td>Noon</td>
                                    <td>FBN</td>
                                    <td>Sales Person 1</td>
                                    <td>10</td>
                                    <td>1000 <span style="font-size: smaller;">(AED)</span></td>
                                    <td class="status" style="color:green;">QC</td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                    <td>10 Hrs</td>
                                </tr>
                                
                            </tbody>
                            </table>               




                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-hover">
                            <thead style="background-color: #fff;">
                                <tr>

                                <th scope="col">#</th>
                                <th scope="col">Order Number</th>
                                <th scope="col">Order Details</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Status</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Price</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">DeadLine Date</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="color:black">1</th>
                                    <td>ALSk1234</td>
                                    <td>Thinkpad T460 </td>
                                    <td>Noon</td>
                                    <td>Sales Person 1</td>
                                    <td class="status" style="color:orange;">Production</td>
                                    <td>10</td>
                                    <td>1000 <span style="font-size: smaller;">(AED)</span></td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                </tr>
                                <tr>
                                    <th style="color:black">2</th>
                                    <td>ALSk1234</td>
                                    <td>Thinkpad T460 </td>
                                    <td>Noon</td>
                                    <td>Sales Person 1</td>
                                    <td class="" style="color:blue;">Packing</td>
                                    <td>10</td>
                                    <td>1000 <span style="font-size: smaller;">(AED)</span></td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                </tr>
                                <tr>
                                    <th style="color:black">3</th>
                                    <td>ALSk1234</td>
                                    <td>Thinkpad T460 </td>
                                    <td>Noon</td>
                                    <td>Sales Person 1</td>
                                    <td class="status" style="color:orange;">Production</td>
                                    <td>10</td>
                                    <td>1000 <span style="font-size: smaller;">(AED)</span></td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                </tr>
                                
                            </tbody>
                            </table>  
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <table class="table table-hover">
                            <thead style="background-color: #fff;">
                                <tr>

                                <th scope="col">#</th>
                                <th scope="col">Order Number</th>
                                <th scope="col">Order Details</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Status</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Price</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">DeadLine Date</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="color:black">1</th>
                                    <td>ALSk1234</td>
                                    <td>Thinkpad T460 </td>
                                    <td>Noon</td>
                                    <td>Sales Person 1</td>
                                    <td class="" style="color: green;">Completed</td>
                                    <td>10</td>
                                    <td>1000 <span style="font-size: smaller;">(AED)</span></td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                </tr>
                                <tr>
                                    <th style="color:black">2</th>
                                    <td>ALSk1234</td>
                                    <td>Thinkpad T460 </td>
                                    <td>Noon</td>
                                    <td>Sales Person 1</td>
                                    <td class="" style="color: green;">Completed</td>
                                    <td>10</td>
                                    <td>1000 <span style="font-size: smaller;">(AED)</span></td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                </tr>
                                <tr>
                                    <th style="color:black">3</th>
                                    <td>ALSk1234</td>
                                    <td>Thinkpad T460 </td>
                                    <td>Noon</td>
                                    <td>Sales Person 1</td>
                                    <td class="" style="color: green;">Completed</td>
                                    <td>10</td>
                                    <td>1000 <span style="font-size: smaller;">(AED)</span></td>
                                    <td>2022-10-02</td>
                                    <td>2022-10-31</td>
                                </tr>
                                
                            </tbody>
                            </table>  
                    </div>
                </div>

                </div>

        
    
    </div>

</div>


<?php include_once('../includes/footer.php'); ?>