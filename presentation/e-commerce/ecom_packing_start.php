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

.packingStartHeadingSec{
        display: flex;
        justify-content: space-between;
        padding: 20px 30px;
    }
.packingStartHeading{
        font-size: 30px;
        font-weight: 700;
    }
.packingStartContentSec{
        border: #f8f9fa 1px solid;
        border-radius: 5px;
        padding: 10px;
        background-color: #fff;
        box-shadow:0 5px 25px hsl(0deg 0% 78% / 30%);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-size: 15px;
}
.tableSec th{
        color: #168eb4;
    }
.tableSec{
    width: 100%;
    overflow-y: auto;
    overflow-x: auto;

}

input[type=text]{
    height: 30px;
}

/* //////// */


    /* ///////////////// */

</style>

<div class="packingStartBody">
    <div class="row packingStartHeadingSec">
        <div class="packingStartHeading">
            <p>Packing Order</p>
        </div>
        <div class="">
                hdjshfkjh
        </div>

    </div>

    <div class="packingStartContentSec">
        <br>
        <div class="scanPackingSec" style="width: 70%;">
            <form action="" method="post">
                <div class="scanNumberSec row d-flex justify-content-between">
                    
                    <div class="col-md-5">
                        <div class="row">
                            <label class="col-5 pt-2"> Scan Alsakb Number</label>
                            <input class="col-7" type="text">
                            
                        </div>                
                    </div>
                    <div class="col-md-1"> </div>
                    <div class="col-md-1"> 
                        <label class="pt-2">
                           <span style="font-size: larger;">
                                OR
                           </span>
                        </label>
                    </div>
                    <div class="col-md-5">
                        <div class="row">                            
                            <label class="col-5 pt-2"> Scan MFG Number</label>
                            <input class="col-7" type="text">
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                    <div class="col-md-5">
                        <div class="row">
                            <label class="col-5 pt-2">Order Number</label>
                            <input class="col-7" type="text">
                            
                        </div>                
                    </div>

            </div>
               
        </div>
        <br><br>

        <div class="tableSec" style="width: 80%; ">
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
                    
                    
                    
                </tbody>
            </table>       
        </div>

        <div class="scanDetailsSec" style="width: 70%; ">

            <div class="row d-flex justify-content-between">
                <div class="col-md-5">
                    <div class="row">
                        <label class="col-5 pt-2">Brand</label>
                        <input class="col-7" type="text">
                        <!-- <div class="col-2"></div>    -->
                    </div>                
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="row">
                        <!-- <div class="col-3"></div> -->
                        <label class="col-5 pt-2">Model</label>
                        <input class="col-7" type="text">
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-between">
                <div class="col-md-5">
                    <div class="row">
                        <label class="col-5 pt-2">Processor</label>
                        <input class="col-7" type="text">
                        <!-- <div class="col-2"></div>    -->
                    </div>                
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="row">
                        <!-- <div class="col-3"></div> -->
                        <label class="col-5 pt-2">Core</label>
                        <input class="col-7" type="text">
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-between">
                <div class="col-md-5">
                    <div class="row">
                        <label class="col-5 pt-2">Generation</label>
                        <input class="col-7" type="text">
                        <!-- <div class="col-2"></div>    -->
                    </div>                
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="row">
                        <!-- <div class="col-3"></div> -->
                        <label class="col-5 pt-2">Speed</label>
                        <input class="col-7" type="text">
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-between">
                <div class="col-md-5">
                    <div class="row">
                        <label class="col-5 pt-2">Touch</label>
                        <input class="col-7" type="text">
                        <!-- <div class="col-2"></div>    -->
                    </div>                
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="row">
                        <!-- <div class="col-3"></div> -->
                        <label class="col-5 pt-2">Screen Size</label>
                        <input class="col-7" type="text">
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-between">
                <div class="col-md-5">
                    <div class="row">
                        <label class="col-5 pt-2">Resolution</label>
                        <input class="col-7" type="text">
                        <!-- <div class="col-2"></div>    -->
                    </div>                
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="row">
                        <!-- <div class="col-3"></div> -->
                        <label class="col-5 pt-2">RAM</label>
                        <input class="col-7" type="text">
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-between">
                <div class="col-md-5">
                    <div class="row">
                        <label class="col-5 pt-2">HDD Type</label>
                        <input class="col-7" type="text">
                        <!-- <div class="col-2"></div>    -->
                    </div>                
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="row">
                        <!-- <div class="col-3"></div> -->
                        <label class="col-5 pt-2">HDD Capacity</label>
                        <input class="col-7" type="text">
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-between">
                <div class="col-md-5">
                    <div class="row">
                        <label class="col-5 pt-2">OS</label>
                        <input class="col-7" type="text">
                        <!-- <div class="col-2"></div>    -->
                    </div>                
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="row">
                        <!-- <div class="col-3"></div> -->
                        <label class="col-5 pt-2">Inventory Location</label>
                        <input class="col-7" type="text">
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-between">
                <div class="col-md-5">
                    <div class="row">
                        <label class="col-5 pt-2">Graphic Brand</label>
                        <input class="col-7" type="text">
                        <!-- <div class="col-2"></div>    -->
                    </div>                
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="row">
                        <!-- <div class="col-3"></div> -->
                        <label class="col-5 pt-2">Graphic Capacity</label>
                        <input class="col-7" type="text">
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-between">
                <div class="col-md-5">
                    <div class="row">
                        <label class="col-5 pt-2">Condition</label>
                        <input class="col-7" type="text">
                        <!-- <div class="col-2"></div>    -->
                    </div>                
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="row">
                        <!-- <div class="col-3"></div> -->
                        <label class="col-5 pt-2">Charger</label>
                        <input class="col-7" type="text">
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-between">
                <div class="col-md-5">
                    <div class="row">
                        <label class="col-5 pt-2">Packing Type</label>
                        <input class="col-7" type="text">
                        <!-- <div class="col-2"></div>    -->
                    </div>                
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="row">
                        <!-- <div class="col-3"></div> -->
                        <label class="col-5 pt-2">Shipping Method</label>
                        <input class="col-7" type="text">
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-between">
                <div class="col-md-5">
                    <div class="row">
                        <label class="col-5 pt-2">QTY</label>
                        <input class="col-7" type="text">
                        <!-- <div class="col-2"></div>    -->
                    </div>                
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <!-- <div class="row">
                        
                        <label class="col-5 pt-2">Shipping Method</label>
                        <input class="col-7" type="text">
                    </div> -->
                </div>
            </div>

            <br>

            

            <br>
            
                
                
               
            
        </div>







    </div>

    <!-- Box -->

    <div class="packingStartContentSec mt-3">
        <div class="PackingSec" style="width: 70%;">

            <div class="row">
                    <div class="col-3" >
                        <ul class="nav nav-tabs d-flex flex-column" id="myTab" role="tablist">
                            <li class="nav-item">
                                <div class="nav-link active" id="amazon-tab" data-toggle="tab" href="#amazon" role="tab" aria-controls="home" aria-selected="true">
                                    <span style="color: #AFAFAF; font-weight: 700;">Single Box-Amazon</span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link" id="cartlow-tab" data-toggle="tab" href="#cartlow" role="tab" aria-controls="home" aria-selected="true">
                                    <span style="color: #AFAFAF; font-weight: 700;">Single Box-Cartlow</span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link" id="noon-tab" data-toggle="tab" href="#noon" role="tab" aria-controls="home" aria-selected="true">
                                    <span style="color: #AFAFAF; font-weight: 700;">Single Box-Noon</span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                <span style="color: #AFAFAF; font-weight: 700">Bulk Box</span>
                                </div>
                            </li>                       
                        </ul>
                    </div>   

                    <div class="tab-content tableSec1 col-9" id="myTabContent">
                        <!-- Amazon -->
                        <div class="tab-pane fade show active" id="amazon" role="tabpanel" aria-labelledby="amazon-tab">
                            <!-- single box -->
                            <div class="row text-center">
                                <div class="col-4">
                                    <!-- <div class="row"> -->
                                        <h5>Cartoon</h5>
                                    <!-- </div> -->
                                    <div class="row d-flex justify-content-center">
                                        <img class="img-fluid" src="./images/laptopbox.jpg" alt="" srcset="" style="height: 250px;">
                                    </div>

                                </div>
                                <div class="col-4">
                                    <h5>Bubble</h5>
                                    <div class="row d-flex justify-content-center">
                                        <img class="img-fluid" src="./images/bubble-wrap-bag.jpg" alt="" srcset="" style="height: 250px;">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <h5>Sheet</h5>
                                    <div class="row d-flex justify-content-center">
                                        <img class="img-fluid" src="./images/cusion.jpg" alt="" srcset="" style="height: 250px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Cartlow -->
                        <div class="tab-pane fade" id="cartlow" role="tabpanel" aria-labelledby="cartlow-tab">
                            <!-- single box -->
                            <div class="row text-center">
                                <div class="col-4">
                                    <!-- <div class="row"> -->
                                        <h5>Cartoon cartlow</h5>
                                    <!-- </div> -->
                                    <div class="row d-flex justify-content-center">
                                        <img class="img-fluid" src="./images/laptopbox.jpg" alt="" srcset="" style="height: 250px;">
                                    </div>

                                </div>
                                <div class="col-4">
                                    <h5>Bubble</h5>
                                    <div class="row d-flex justify-content-center">
                                        <img class="img-fluid" src="./images/bubble-wrap-bag.jpg" alt="" srcset="" style="height: 250px;">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <h5>Sheet</h5>
                                    <div class="row d-flex justify-content-center">
                                        <img class="img-fluid" src="./images/cusion.jpg" alt="" srcset="" style="height: 250px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Noon -->
                        <div class="tab-pane fade" id="noon" role="tabpanel" aria-labelledby="noon-tab">
                            <!-- single box -->
                            <div class="row text-center">
                                <div class="col-4">
                                    <!-- <div class="row"> -->
                                        <h5>Cartoon Noon</h5>
                                    <!-- </div> -->
                                    <div class="row d-flex justify-content-center">
                                        <img class="img-fluid" src="./images/laptopbox.jpg" alt="" srcset="" style="height: 250px;">
                                    </div>

                                </div>
                                <div class="col-4">
                                    <h5>Bubble</h5>
                                    <div class="row d-flex justify-content-center">
                                        <img class="img-fluid" src="./images/bubble-wrap-bag.jpg" alt="" srcset="" style="height: 250px;">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <h5>Sheet</h5>
                                    <div class="row d-flex justify-content-center">
                                        <img class="img-fluid" src="./images/cusion.jpg" alt="" srcset="" style="height: 250px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Bulkbox -->
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="contact-tab">
                            <!-- bulk box -->
                            <div class="row text-center">
                                    <div class="col-4">
                                        <!-- <div class="row"> -->
                                            <h5>Bulk Cartoon</h5>
                                        <!-- </div> -->
                                        <div class="row d-flex justify-content-center">
                                            <img class="img-fluid" src="./images/laptopbox.jpg" alt="" srcset="" style="height: 250px;">
                                        </div>

                                    </div>
                                    <div class="col-4">
                                        <h5>Bubble</h5>
                                        <div class="row d-flex justify-content-center">
                                            <img class="img-fluid" src="./images/bubble-wrap-bag.jpg" alt="" srcset="" style="height: 250px;">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <h5>Sheet</h5>
                                        <div class="row d-flex justify-content-center">
                                            <img class="img-fluid" src="./images/cusion.jpg" alt="" srcset="" style="height: 250px;">
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <!-- /// -->
                    </div>
            </div>


        </div>
    </div>

    <!-- Charger -->

    <div class="packingStartContentSec mt-3">
        <div class="PackingSec" style="width: 70%;">

            <div class="row">
                    <div class="col-3" >
                        <ul class="nav nav-tabs d-flex flex-column" id="myTab" role="tablist">
                            <li class="nav-item">
                                <div class="nav-link active text-danger" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                    <span style="color: #AFAFAF; font-weight: 700;">Charger Type</span>
                                </div>
                            </li>
                            <!-- <li class="nav-item">
                                <div class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                <span style="color: #AFAFAF; font-weight: 700">Bulk Box</span>
                                </div>
                            </li>                        -->
                        </ul>
                    </div>   

                    <div class="tab-content tableSec1 col-9" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <!-- single box -->
                            <div class="row text-center">
                                <div class="col-4">
                                    <!-- <div class="row"> -->
                                        <h5>Charger UK</h5>
                                    <!-- </div> -->
                                    <div class="row d-flex justify-content-center">
                                        <img class="img-fluid" src="./images/ukcharger.jpg" alt="" srcset="" style="height: 250px;">
                                    </div>

                                </div>
                                <div class="col-4">
                                    <h5>Charger US</h5>
                                    <div class="row d-flex justify-content-center">
                                        <img class="img-fluid" src="./images/US charger2.jpeg" alt="" srcset="" style="height: 250px;">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <h5>Charger EU</h5>
                                    <div class="row d-flex justify-content-center">
                                        <img class="img-fluid" src="./images/EU charger2.jpg" alt="" srcset="" style="height: 250px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="contact-tab">
                          

                        </div>
                    </div>
            </div>


        </div>
    </div>

    <div class="packingStartContentSec">
        
        <div class="row">
                <a href="./ecom_packing_next.php">
                <div class="btn btn-success">
                    Next
                </div>
                </a>
            </div>

        </div>







    </div>


</div>


<?php include_once('../includes/footer.php'); ?>