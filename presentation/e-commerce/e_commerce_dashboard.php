<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

?>
<!-- Styles Ecommerce Page -->
<style>

    *{
        margin: 0px;
        padding: 0px;
    }

    p{
        margin-bottom: 0px;
    }

    
    .EComBody{
        padding-left: 20px;
        padding-right: 20px;
        
        
    }
    .EComPlatformes{
        margin-top: 10px;
        /* background-color: #ffffff   ; */
       
       
    }
    .platformCard{
        background-color: #fff;
        padding: 5px;
    }
    .platformCard:hover {
         box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }   
   


    .createListingCard{
        border: #168eb4 solid 2px;
        height: 100px;

    }

    .showListingSec{
        height: auto;
        /* background-color: #edf2f5; */
        background-color: #fff;
    }

    .showListingCard{
        height: auto;
        /* border: #168eb4 solid 2px;     */
        /* border-radius: 0px 0px 0px 0px; */

        border: #f8f9fa 1px;
        border-radius: 5px;
        padding: 10px;
        background-color: #fff;
        box-shadow:0 5px 25px hsl(0deg 0% 78% / 30%);
        

    }
    .showListingCard:hover {
         box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    } 

    .EComContentSec{
        margin-top: 10px;
        /* height: 70vh; */
        /* background-color: #f8f9fa; */
        background-color: #edf2f5   ;
        box-shadow:0 5px 25px hsl(0deg 0% 78% / 30%);
    }

    .totOrderCard{
        margin-left: 10px;
        margin-top: 10px;
        height: 150px;
        width: 300px;
        /* background-color: #edf6ff; */
        background-color: #fff;
        box-shadow:0 5px 5px hsl(0deg 0% 78% / 30%);
        /* box-shadow: 10px 10px 11px -2px rgba(0,0,0,0.22); */
        border: #f8f9fa 1px;
        border-radius: 5px;
        padding: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .totOrderCard:hover {
         box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    } 

    

    .FBCard{
        margin-left: 10px;
        margin-top: 10px;
        height: 150px;
        width: 200px;
        /* background-color: #edf6ff; */
        background-color: #fff;
        box-shadow:0 5px 5px hsl(0deg 0% 78% / 30%);
        border: #f8f9fa 1px;
        border-radius: 5px;
        padding: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        
    }

    .FBCard:hover {
         box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    a{
        text-decoration: none;
    }
    .cardOrder{        
        font-weight: 400;
        font-size: 20px;
    }

    .cardOrderShow{
        font-size: 40px;
        margin-top: -10px;
        margin-bottom: -10px;
    }
    
    .cardStockShow{
        display: flex;
        justify-content: center;
        gap: 20%;
    }
    
    /* .salesPersonCard{
        height: 150px;
        width: 300px;
        background-color: #edf6ff;
        box-shadow:0 5px 5px hsl(0deg 0% 78% / 30%);
        border: #f8f9fa 1px;
        border-radius: 5px;
        padding: 15px;
        
    } */
    .salesPersonCardNew{
        height: auto;
        /* background-color: #edf6ff; */
        background-color: #fff;
        box-shadow:0 5px 5px hsl(0deg 0% 78% / 30%);
        border: #f8f9fa 1px;
        border-radius: 5px;

    }

    /* @media screen and (max-width: 1366px) {
         .listingLogo{
            height: 40px;
         }
         .showListingCard{
            width: 500px;
         }
    } */

    
    /* .dot {
  height: 15px;
  width: 15px;  
  border-radius: 50%;
  display: inline-block;
} */

 
</style>


<div class="container-fluid EComBody">
    <div class="row col-md-12 pt-5">        
        <h2><i class="fa-solid fa-chart-line"></i><span style="font-weight: 700;"> &nbsp;Dashbord</span></h2>
    </div>

    <div class="row col-md-12 EComTopSec">
    
        <div class="row col-md-12">
            <a href="../e-commerce/ecom_create_order.php" type="button" class="btn btn-primary mr-2">Create Order</a>
            <a href="../e-commerce/ecom_orderdetail_list.php" type="button" class="btn btn-primary mr-2"> Order Details</a>
            <a href="../e-commerce/ecom_stock_cheking.php" type="button" class="btn btn-primary mr-2">FInd Location</a>
            <a href="../e-commerce/ecom_packing.php" type="button" class="btn btn-primary mr-2">E-Commerce Packing</a>

            <!-- <button type="button" class="btn btn-primary ml-2">E-Commerce Packing</button>  -->
        </div>

        <!-- Platformes Bar -->
   
        <div class="EComPlatformes pt-3 pb-3" style="width: 100%;">

                <div class="col-md-12 pt-3">
                    <h5 class="" style="font-weight: 600;">Create a Listing</h5>
                    <hr>
                 </div>

            <div class="row"> 
                <div class="col-md-2 ml-1 platformCard">
                    <a href="../e-commerce/ecom_amazon.php" style="width: 100%;" >
                        <div class="row d-flex justify-content-center">
                            <!-- <div class="col-md-12"> -->
                                <img src="./images/Amazon-Logo-TransparentB-PNG.png" alt="" height="70px">
                            <!-- </div> -->
                            <div class="col-md-12 text-center">
                            <span style="color: #168eb4;font-weight: 700; font-size:15px"> &nbsp;Amazon</span>
                            </div>
                        
                        </div>
                    </a>
                </div>
                <div class="col-md-2 ml-1 platformCard">
                    <a href="../e-commerce/ecom_noon.php" style="width: 100%;" >
                        <div class="row d-flex justify-content-center">
                            <!-- <div class="col-md-12"> -->
                                <img src="./images/noon-logo 1.png" alt="" height="70px">
                            <!-- </div> -->
                            <div class="col-md-12 text-center">
                                <span style="color: #168eb4;font-weight: 700; font-size:15px"> &nbsp;noon</span>
                            </div>
                        
                        </div>
                    </a>
                </div>
                <div class="col-md-2 ml-1 platformCard">
                    <a href="../e-commerce/ecom_noon.php" style="width: 100%;" >
                        <div class="row d-flex justify-content-center">
                            <!-- <div class="col-md-12"> -->
                                <img src="./images/cartlowB.jpg" alt="" height="70px">
                            <!-- </div> -->
                            <div class="col-md-12 text-center">
                                <span style="color: #168eb4;font-weight: 700; font-size:15px"> &nbsp;Cartlow</span>
                            </div>
                        
                        </div>
                    </a>
                </div>
                <div class="col-md-2 ml-1 platformCard">
                    <a href="../e-commerce/ecom_noon.php" style="width: 100%;" >
                        <div class="row d-flex justify-content-center">
                            <!-- <div class="col-md-12"> -->
                                <img src="./images/shopee logob.png" alt="" height="70px">
                            <!-- </div> -->
                            <div class="col-md-12 text-center">
                                <span style="color: #168eb4;font-weight: 700; font-size:15px"> &nbsp;Shopee</span>
                            </div>
                        
                        </div>
                    </a>
                </div>
                <div class="col-md-2 ml-1 platformCard">
                    <a href="../e-commerce/ecom_noon.php" style="width: 100%;" >
                        <div class="row d-flex justify-content-center">
                            <!-- <div class="col-md-12"> -->
                                <img src="./images/lazadaB.png" alt="" height="70px">
                            <!-- </div> -->
                            <div class="col-md-12 text-center">
                                <span style="color: #168eb4;font-weight: 700; font-size:15px"> &nbsp;Lazada</span>
                            </div>
                        
                        </div>
                    </a>
                </div>
                
            </div>                     
        </div>    
        
        <!--  ////-->
    </div>

    <!-- Ecom Content Section -->

    <div class="EComContentSec">       

        <!-- show listing Section -->

        <div class="row col-md-12 showListingSec mt-4 mb-4 pb-3">
            <!-- <div class="showListingSec row col-md-12 bg-light"> -->
                <div class="col-md-12 pt-3">
                    <h5 class="" style="font-weight: 600;">Listing Count</h5>
                    <hr>
                 </div>
                
                <!-- amazon -->
                <div class="col-sm-3 col-md-2 m-2 showListingCard">
                   
                   <a href="#">
                    <div class="row col-md-12">
                        <div class="col-md-1"></div>
                        <div class="col-md-4"> 
                            <img class="listingLogo img-fluid mt-3" src="./images/Amazon-Logo-TransparentB-PNG.png" alt="">                            
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-6">
                            <p style="color: #168eb4;font-weight: 700; font-size:30px"> &nbsp;100</p>
                            <p  style="color: #168eb4;font-weight: 500; font-size:15px"><span style="font-weight: 700;"> &nbsp;USA</span>&nbsp;Listings</p>
                        </div>                       
                    </div>                   
                </a> 
                </div>
                <!-- amazon -->
                <div class="col-md-2 m-2 showListingCard">
                   
                   <a href="#">
                    <div class="row col-md-12">
                        <div class="col-md-1"></div>
                        <div class="col-md-4"> 
                            <img class="img-fluid mt-3" src="./images/Amazon-Logo-TransparentB-PNG.png" alt="">                           
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-6">
                            <span style="color: #168eb4;font-weight: 700; font-size:30px"> &nbsp;100</span>
                            <p  style="color: #168eb4;font-weight: 500; font-size:15px"><span style="font-weight: 700;"> &nbsp;UK</span>&nbsp;Listings</p>
                        </div>
                       
                    </div>
                    
                </a> 
                </div>
                <!-- amazon -->
                <div class="col-md-2 m-2 showListingCard">
                   
                   <a href="#">
                    <div class="row col-md-12">
                        <div class="col-md-1"></div>
                        <div class="col-md-4"> 
                            <img class="img-fluid mt-3" src="./images/Amazon-Logo-TransparentB-PNG.png" alt="">                            
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-6">
                            <span style="color: #168eb4;font-weight: 700; font-size:30px"> &nbsp;100</span>
                            <p  style="color: #168eb4;font-weight: 500; font-size:15px"><span style="font-weight: 700;"> &nbsp;UAE</span>&nbsp;Listings</p>
                        </div>
                       
                    </div>
                    
                </a> 
                </div>
                <!-- noon -->
                
                <div class="col-md-2 m-2 showListingCard">
                  
                   <a href="./ecom_noon_view_listing.php">
                    <div class="row col-md-12">
                        <div class="col-md-1"></div>
                        <div class="col-md-4"> 
                            <img class="img-fluid mt-3" src="./images/noon-logo 1.png" alt="">                           
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-6">
                            <span style="color: #168eb4;font-weight: 700; font-size:30px"> &nbsp;100</span>
                            <span style="color: #168eb4;font-weight: 500; font-size:15px"> &nbsp;Listings</span>
                        </div>
                       
                    </div>
                    
                </a> 
                </div>
                <!-- cartlaw -->
                <div class="col-md-2 m-2 showListingCard">
                   
                   <a href="#">
                    <div class="row col-md-12">
                        <div class="col-md-1"></div>
                        <div class="col-md-4"> 
                            <img class="img-fluid mt-3" src="./images/cartlowB.jpg" alt="">                           
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-6">
                            <span style="color: #168eb4;font-weight: 700; font-size:30px"> &nbsp;100</span><br>
                            <span style="color: #168eb4;font-weight: 500; font-size:15px"> &nbsp;Listings</span>
                        </div>
                       
                    </div>                    
                 </a> 
                </div>
                <!-- Shopee -->
                <div class="col-md-2 m-2 showListingCard">
                   
                   <a href="#">
                    <div class="row col-md-12">
                        <div class="col-md-1"></div>
                        <div class="col-md-4"> 
                            <img class="img-fluid mt-3" src="./images/shopee logob.png" alt="">                           
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-6">
                            <span style="color: #168eb4;font-weight: 700; font-size:30px"> &nbsp;100</span><br>
                            <p  style="color: #168eb4;font-weight: 500; font-size:15px"><span style="font-weight: 700;"> &nbsp;VN</span>&nbsp;Listings</p>
                        </div>                       
                    </div>                    
                 </a> 
                </div>
                <!-- Shopee -->
                <div class="col-md-2 m-2 showListingCard">
                   
                   <a href="#">
                    <div class="row col-md-12">
                        <div class="col-md-1"></div>
                        <div class="col-md-4"> 
                            <img class="img-fluid mt-3" src="./images/shopee logob.png" alt="">                           
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-6">
                            <span style="color: #168eb4;font-weight: 700; font-size:30px"> &nbsp;100</span><br>
                            <p  style="color: #168eb4;font-weight: 500; font-size:15px"><span style="font-weight: 700;"> &nbsp;MY</span>&nbsp;Listings</p>
                        </div>                       
                    </div>                    
                 </a> 
                </div>
                <!-- Shopee -->
                <div class="col-md-2 m-2 showListingCard">
                   
                   <a href="#">
                    <div class="row col-md-12">
                        <div class="col-md-1"></div>
                        <div class="col-md-4"> 
                            <img class="img-fluid mt-3" src="./images/shopee logob.png" alt="">                           
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-6">
                            <span style="color: #168eb4;font-weight: 700; font-size:30px"> &nbsp;100</span><br>
                            <p  style="color: #168eb4;font-weight: 500; font-size:15px"><span style="font-weight: 700;"> &nbsp;IN</span>&nbsp;Listings</p>
                        </div>                       
                    </div>                    
                 </a> 
                </div>
                <!-- lazaada -->
                <div class="col-md-2 m-2 showListingCard">
                   
                   <a href="#">
                    <div class="row col-md-12">
                        <div class="col-md-1"></div>
                        <div class="col-md-4"> 
                            <img class="img-fluid mt-3" src="./images/lazadaB.png" alt="">                           
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-6">
                            <span style="color: #168eb4;font-weight: 700; font-size:30px"> &nbsp;100</span><br>
                            <p  style="color: #168eb4;font-weight: 500; font-size:15px"><span style="font-weight: 700;"> &nbsp;VN</span>&nbsp;Listings</p>
                        </div>
                       
                    </div>                    
                 </a> 
                </div>
                <!-- lazada My -->
                <div class="col-md-2 m-2 showListingCard">
                   
                   <a href="#">
                    <div class="row col-md-12">
                        <div class="col-md-1"></div>
                        <div class="col-md-4"> 
                            <img class="img-fluid mt-3" src="./images/lazadaB.png" alt="">                           
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-6">
                            <span style="color: #168eb4;font-weight: 700; font-size:30px"> &nbsp;100</span><br>
                            <p  style="color: #168eb4;font-weight: 500; font-size:15px"><span style="font-weight: 700;"> &nbsp;MY</span>&nbsp;Listings</p>
                        </div>
                       
                    </div>                    
                 </a> 
                </div>
                <!-- lazada IN -->
                <div class="col-md-2 m-2 showListingCard">
                   
                   <a href="#">
                    <div class="row col-md-12">
                        <div class="col-md-1"></div>
                        <div class="col-md-4"> 
                            <img class="img-fluid mt-3" src="./images/lazadaB.png" alt="">                           
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-6">
                            <span style="color: #168eb4;font-weight: 700; font-size:30px"> &nbsp;100</span><br>
                            <p  style="color: #168eb4;font-weight: 500; font-size:15px"><span style="font-weight: 700;"> &nbsp;IN</span>&nbsp;Listings</p>
                        </div>
                       
                    </div>                    
                 </a> 
                </div>
                
                
                    
            <!-- </div> -->
        </div>

        <!-- Total Order Card Section -->

        <div class="row col-md-12 mt-3">

                <div class="col-md-12 pt-3">
                    <h5 class="" style="font-weight: 600;">Order Details</h5>
                    <hr>
                 </div>
            
            <div class="totOrderCard">
                <a class="row col-md-12" href="./ecom_orderslist.php">
                    <div class="cardOrder col-md-12 text-center">
                        <p> <span style="color: #17a2b8; font-weight: 600;">Today</span> Orders</p> 
                        
                    </div>
                    <div class="cardOrderShow col-md-12 text-center">                        
                        <p><span style="color: #168eb4;font-weight: 700;">50</span></p>
                    </div>
                    <div class=" class cardStockShow col-md-12 text-center">
                        <div class="">
                            <div>Direct Amazon</div>
                            <div>15</div>
                        </div>
                        <div class="">
                            <div>Direct Noon</div>
                            <div>30</div>
                        </div>
                        <div class="">
                            <div>Direct Cartlaw</div>
                            <div>05</div>
                        </div>                        
                        <!-- <div class="">
                            <div>FBC</div>
                            <div>05</div>
                        </div>                         -->
                    </div>                  
                    </a>
                 </div>           
            <div class="totOrderCard ml-4">
                <a class="row col-md-12" href="./ecom_orderslist.php">
                    <div class="cardOrder col-md-12 text-center">
                        <p><span style="color: #17a2b8; font-weight: 600;">Total </span>Orders</p> 
                        
                    </div>
                    <div class="cardOrderShow col-md-12 text-center">                        
                        <p><span style="color: #168eb4;font-weight: 700;">50</span></p>
                    </div>
                    <div class=" class cardStockShow col-md-12 text-center">
                        <div class="">
                            <div>Direct Amazon</div>
                            <div>15</div>
                        </div>
                        <div class="">
                            <div>Direct Noon</div>
                            <div>30</div>
                        </div>
                        <div class="">
                            <div>Direct Cartlaw</div>
                            <div>05</div>
                        </div>         
                        <!-- <div class="">
                            <div>FBP</div>
                            <div>05</div>
                        </div>                         -->
                    </div>                  
                    </a>
                 </div>    
                 
                 <!-- FB Cards -->
            <div class="FBCard ml-4">
                <a class="row col-md-12" href="./ecom_orderslist.php">
                    <div class="cardOrder col-md-12 text-center">
                        <p><span style="color: #17a2b8; font-weight: 600;">FBN </span>Orders</p> 
                        
                    </div>
                    <div class="cardOrderShow col-md-12 text-center">                        
                        <p><span style="color: #168eb4;font-weight: 700;">50</span></p>
                    </div>
                                 
                    </a>
                 </div>           
            <div class="FBCard ml-4">
                <a class="row col-md-12" href="./ecom_orderslist.php">
                    <div class="cardOrder col-md-12 text-center">
                        <p><span style="color: #17a2b8; font-weight: 600;">FBA </span>Orders</p> 
                        
                    </div>
                    <div class="cardOrderShow col-md-12 text-center">                        
                        <p><span style="color: #168eb4;font-weight: 700;">50</span></p>
                    </div>
                                    
                    </a>
                 </div>           
            <div class="FBCard ml-4">
                <a class="row col-md-12" href="./ecom_orderslist.php">
                    <div class="cardOrder col-md-12 text-center">
                        <p><span style="color: #17a2b8; font-weight: 600;">FBC </span>Orders</p> 
                        
                    </div>
                    <div class="cardOrderShow col-md-12 text-center">                        
                        <p><span style="color: #168eb4;font-weight: 700;">50</span></p>
                    </div>
                             
                    </a>
                 </div> 
                 
                 <!-- Tot Order Card -->

                 <div class="FBCard ml-4">
                <a class="row col-md-12" href="./ecom_orderslist.php">
                    <div class="cardOrder col-md-12 text-center">
                        <p><span style="color: #17a2b8; font-weight: 600;">All </span>Orders</p> 
                        
                    </div>
                    <div class="cardOrderShow col-md-12 text-center">                        
                        <p><span style="color: #168eb4;font-weight: 700;">50</span></p>
                    </div>
                             
                    </a>
                 </div> 



        </div>

        <!-- Sales Person Summery Card Section -->

        <div class="salesPersonsSec row col-md-12 mt-5">
                <!-- <div class="cardOrder col-md-12">
                        <p>Sales Persons</p>                         
                </div> -->

                <div class="col-md-12 pt-3">
                    <h5 class="" style="font-weight: 600;">Team Details</h5>
                    <hr>
                 </div>

                

                <div class="col-md-12">
                    
                    <div class="row">
                        <div class="col-md-3 mt-2">
                            <div class="salesPersonCardNew">
                                <div class="row col-md-12">
                                    <div class="col-md-6">
                                        <img class="img-fluid" src="./notebook.png" alt="" srcset="">
                                    </div>
                                    <div class="col-md-6 pl-4 pt-4">
                                        <h5 style="font-weight: 800;">Sales Person 1</h5>
                                        <p style="font-size: medium; font-weight: 500; ">Amazon</p>
                                        <p style="font-size: medium; font-weight: 500; color:green">Online</p>
                                    </div>
                                </div>

                                <div class="row col-md-12 pl-5">
                                    <h5 class=""> Today Listing Count &nbsp;<span style="color: #168eb4;font-weight: 700; font-size:x-large;">50</span></h5>
                                </div>
                            </div>    
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="salesPersonCardNew">
                                <div class="row col-md-12">
                                    <div class="col-md-6">
                                        <img class="img-fluid" src="./notebook.png" alt="" srcset="">
                                    </div>
                                    <div class="col-md-6 pl-4 pt-4">
                                        <h5 style="font-weight: 800;">Sales Person 1</h5>
                                        <p style="font-size: medium; font-weight: 500; ">Amazon</p>
                                        <p style="font-size: medium; font-weight: 500; color:green">Online</p>
                                    </div>
                                </div>

                                <div class="row col-md-12 pl-5">
                                    <h5 class=""> Today Listing Count &nbsp;<span style="color: #168eb4;font-weight: 700; font-size:x-large;">50</span></h5>
                                </div>
                            </div>    
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="salesPersonCardNew">
                                <div class="row col-md-12">
                                    <div class="col-md-6">
                                        <img class="img-fluid" src="./notebook.png" alt="" srcset="">
                                    </div>
                                    <div class="col-md-6 pl-4 pt-4">
                                        <h5 style="font-weight: 800;">Sales Person 1</h5>
                                        <p style="font-size: medium; font-weight: 500; ">Amazon</p>
                                        <p style="font-size: medium; font-weight: 500; color:green">Online</p>
                                    </div>
                                </div>

                                <div class="row col-md-12 pl-5">
                                    <h5 class=""> Today Listing Count &nbsp;<span style="color: #168eb4;font-weight: 700; font-size:x-large;">50</span></h5>
                                </div>
                            </div>    
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="salesPersonCardNew">
                                <div class="row col-md-12">
                                    <div class="col-md-6">
                                        <img class="img-fluid" src="./notebook.png" alt="" srcset="">
                                    </div>
                                    <div class="col-md-6 pl-4 pt-4">
                                        <h5 style="font-weight: 800;">Sales Person 1</h5>
                                        <p style="font-size: medium; font-weight: 500; ">Amazon</p>
                                        <p style="font-size: medium; font-weight: 500; color:green">Online</p>
                                    </div>
                                </div>

                                <div class="row col-md-12 pl-5">
                                    <h5 class=""> Today Listing Count &nbsp;<span style="color: #168eb4;font-weight: 700; font-size:x-large;">50</span></h5>
                                </div>
                            </div>    
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="salesPersonCardNew">
                                <div class="row col-md-12">
                                    <div class="col-md-6">
                                        <img class="img-fluid" src="./notebook.png" alt="" srcset="">
                                    </div>
                                    <div class="col-md-6 pl-4 pt-4">
                                        <h5 style="font-weight: 800;">Sales Person 1</h5>
                                        <p style="font-size: medium; font-weight: 500; ">Amazon</p>
                                        <p style="font-size: medium; font-weight: 500; color:green">Online</p>
                                    </div>
                                </div>

                                <div class="row col-md-12 pl-5">
                                    <h5 class=""> Today Listing Count &nbsp;<span style="color: #168eb4;font-weight: 700; font-size:x-large;">50</span></h5>
                                </div>
                            </div>    
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="salesPersonCardNew">
                                <div class="row col-md-12">
                                    <div class="col-md-6">
                                        <img class="img-fluid" src="./notebook.png" alt="" srcset="">
                                    </div>
                                    <div class="col-md-6 pl-4 pt-4">
                                        <h5 style="font-weight: 800;">Sales Person 1</h5>
                                        <p style="font-size: medium; font-weight: 500; ">Amazon</p>
                                        <p style="font-size: medium; font-weight: 500; color:green">Online</p>
                                    </div>
                                </div>

                                <div class="row col-md-12 pl-5">
                                    <h5 class=""> Today Listing Count &nbsp;<span style="color: #168eb4;font-weight: 700; font-size:x-large;">50</span></h5>
                                </div>
                            </div>    
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="salesPersonCardNew">
                                <div class="row col-md-12">
                                    <div class="col-md-6">
                                        <img class="img-fluid" src="./notebook.png" alt="" srcset="">
                                    </div>
                                    <div class="col-md-6 pl-4 pt-4">
                                        <h5 style="font-weight: 800;">Sales Person 1</h5>
                                        <p style="font-size: medium; font-weight: 500; ">Amazon</p>
                                        <p style="font-size: medium; font-weight: 500; color:green">Online</p>
                                    </div>
                                </div>

                                <div class="row col-md-12 pl-5">
                                    <p class="h5"> Today Listing Count &nbsp;<span style="color: #168eb4;font-weight: 700; font-size:x-large;">50</span></p>
                                </div>
                            </div>    
                        </div>
                        

                    </div>
                    <!-- sales person card -->
                    <!-- <div class="salesPersonCard col-md-3 ml-3">
                        <a class="row col-md-12" href="./ecom_orderslist.php">
                            <div class="row">
                                <div class="cardPersonName col-md-12 text-center">
                                    <h5>Person 1 <span class="dot" style="background-color: greenyellow;"></span></h5>
                                </div>
                                <div class="cardPersonBody col-md-12 text-center">
                                    <div class="row col-md-12">
                                        <div class="col-md-6"><i class="fa-solid fa-user-secret" style="font-size: 64px; margin-top: -15px; margin-left: -20px;"></i></div>
                                        <div class="col-md-6">
                                            <h5>Amazon</h5>
                                            <h4>30 </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>              
                        </a>
                    </div>   -->
                    <!-- <div class="salesPersonCard col-md-3 ml-3">
                        <a class="row col-md-12" href="./ecom_orderslist.php">
                            <div class="row">
                                <div class="cardPersonName col-md-12 text-center">
                                    <h5>Person 2 <span class="dot" style="background-color: red;"></span></h5>
                                </div>
                                <div class="cardPersonBody col-md-12 text-center">
                                    <div class="row col-md-12">
                                        <div class="col-md-6"><i class="fa-solid fa-user-secret" style="font-size: 64px; margin-top: -15px; margin-left: -20px;"></i></div>
                                        <div class="col-md-6">
                                            <h5>Noon</h5>
                                            <h4>40 </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>              
                        </a>
                    </div>   -->
                    <br>
                <br> 
                </div>         
                      
           
        </div>

    </div>


    

</div>



<?php include_once('../includes/footer.php'); ?>