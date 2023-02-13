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

    .orderDetailTable{
        width: 100%;
        overflow-x: scroll;
    }





</style>

<div class="orderListBody">

    <div class="row orderListHeadingSec">
        <div class="orderHeading">
            <p>Order Details</p>
        </div>
        <div class="searchSec">
            <p>Search</p>
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
                        <span style="color: #AFAFAF; font-weight: 700;">Details</span>
                    </div>
                </li>
                <!-- <li class="nav-item">
                    <div class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                    <span style="color: #AFAFAF; font-weight: 700">Open</span>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                    <span style="color: #AFAFAF; font-weight: 700">Closed</span>
                    </div>
                </li> -->
            </ul>
        </div>

        

        <div class="filterSec" >
            
                <select class="DropDown" name="" id="">
                <option selected value="">Filter By Status</option>
                <option value="">Production</option>                                                                      
                <option value="">Ready</option>                                                                      
                <option value="">Completed</option>                                                                      
                </select>
             
        </div>

        </div>

        <!-- Body Section -->

        <div class="tab-content" id="myTabContent">
            <div class="orderDetailTable tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <table class="table table-hover">
                    <thead style="background-color: #fff;">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order Number</th>
                        <th scope="col">Device</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Model</th>
                        <th scope="col">Processor</th>
                        <th scope="col">Core</th>
                        <th scope="col">Generation</th>
                        <th scope="col">Speed</th>
                        <th scope="col">Touch</th>
                        <th scope="col">Screen Size</th>
                        <th scope="col">Resolution</th>
                        <th scope="col">HDD Type</th>
                        <th scope="col">HDD Capacity</th>
                        <th scope="col">Ram</th>
                        <th scope="col">OS</th>
                        <th scope="col">Inventory Location</th>
                        <th scope="col">Graphic Brand</th>
                        <th scope="col">Graphic Capacity</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Charger</th>
                        <th scope="col">Packing Type</th>
                        <th scope="col">Shipping Method</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Total</th>
                        <th scope="col">DeadLine</th>
                        
                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th style="color:black">1</th>
                            <td>abcd123</td>
                            <td>Laptop</td>
                            <td>Lenovo</td>
                            <td>Thinkpad t460</td>
                            <td>Intel</td>
                            <td>i5-3100U</td>
                            <td>3</td>
                            <td>2.80GHz</td>
                            <td>No</td>
                            <td>14</td>
                            <td>1366 x 768</td>
                            <td>SSD</td>
                            <td>256GB</td>
                            <td>8GB</td>
                            <td>Original Windows 10 pro</td>
                            <td>E-Commerce</td>
                            <td>Nvidia</td>
                            <td>4GB</td>
                            <td>Refurbished</td>
                            <td>Yes</td>
                            <td>Single Box</td>
                            <td>FBN</td>
                            <td>10</td>
                            <td>1000 AED</td>
                            <td>10%</td>
                            <td>900 AED</td>
                            <td>2022-10-31</td>
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