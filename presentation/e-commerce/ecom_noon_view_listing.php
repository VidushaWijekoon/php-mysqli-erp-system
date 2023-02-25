<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../includes/header.php';

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
?>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->


<style>

    .NoonViewBody{
        padding-left: 20px;
        padding-right: 20px;
        color: black;
    }
    .NoonViewListingCard{
        display: flex;
        /* color: red; */
        background-color: #f8f9fa;
        box-shadow:0 5px 25px hsl(0deg 0% 78% / 30%);
        /* justify-content: center; */
        /* align-items: center; */
        height: 100vh;
        

    }
    .tableSec{
        width: 100%;
        overflow-x: scroll;
        height: 60vh;
        overflow-y: auto;         
    } 
  
    .cardSec{
        /* height: auto; */
    }

    .countCard{
        display: flex;
        flex-direction: column;
        margin-top: 20px;
        height: 100px;
        width: 100%;
        background-color: #f8f9fa;
        box-shadow:0 5px 25px hsl(0deg 0% 78% / 30%);
        border: #f8f9fa 1px;
        border-radius: 5px;

    }

    .countCard:hover{
        box-shadow:0 30px 25px hsl(0deg 0% 78% / 30%);
    }

    .cardTitle{
        width: 100%;
        color: #168eb4 !important;
        font-weight: 600;
        font-size: medium;
        float: right;
    }
    .cardCount h3{
        padding-left:10%;
        color: #1ca49a !important;
    }

    .filter{
       
    }

    .searchSec input{
        height: 30px;
        width: 83%;
        border-radius: 5px;
        border: 1px solid #f1f1f1;
        
    }
    .DropDown{
        height: 30px;
        width: 83%;
        border-radius: 5px;
        border: 1px solid #f1f1f1;
        /* padding: 0px 10px; */
    }

    

    .modal-content{
         width: 70vw;
         margin-left:-300px;
    }
    @media only screen and (max-width: 1024px) {
        .modal-content{
            width: 90vw;
         margin-left:-200px;
        }
    }

    .editModel table input {
        width: 80px;
    }

    .pageName{
        color: #168eb4 !important;
    }
</style>

<div class="container-fluid NoonViewBody">
    <div class="row col-md-12 pt-2">
        <a href="./ecom_noon.php"><i class="fa-solid fa-left" style="font-size: 30px; color:#aeacac;"></i></a>
    </div>
    <div class="NoonCreateListingForm row col-md-12">
        <div class="row col-md-12">        
            <h3 class="pageName">NOON Listings</h3>
        </div>

        <div class="row col-md-12 CreateListing pt-3">
            <!-- <div class="btnViewListing col-md-3">   
                <a href="./ecom_noon_view_listing.php">
                    <h5 class="">View Listings</h5>
                </a>
            </div> -->
            <!-- <div class="btnCreateListing col-md-3">
                <a href="./ecom_noon.php">
                    <h5>Create Listing</h5>
                </a>
            </div> -->
           
        </div>
        

        <div class="NoonViewListingCard row col-md-12">

                <div class="cardSec col-md-12">
                    <div class="row col-md-12">
                        <div class="col-md-4 col-xl-2">
                            <div class="countCard">
                                <div class="cardTitle mt-2 ml-2">
                                    All Listings
                                </div>
                                <div class="cardCount mt-3">
                                    <h3>102</h3>
                                </div>                            
                            </div>
                        </div>

                        <div class="col-md-4 col-xl-2">
                            <div class="countCard">
                                <div class="cardTitle mt-2 ml-2">
                                    Waiting
                                </div>
                                <div class="cardCount mt-3">
                                    <div class="row">
                                        <h3>60 /<span style="font-size: large;">102</span> </h3>
                                    </div>                                
                                </div>  

                            </div>
                        </div>

                        <div class="col-md-4 col-xl-2">
                         <div class="countCard">
                                <div class="cardTitle mt-2 ml-2">
                                    Submited 
                                </div>
                                <div class="cardCount mt-3">
                                    <div class="row">
                                        <h3>42 /<span style="font-size: large;">102</span> </h3>
                                    </div>                                
                                </div>                            
                        </div>
                        </div>
                        
                        <div class="col-md-4 col-xl-2">
                            <div class="countCard">
                            <div class="cardTitle mt-2 ml-2">
                                    Approved 
                                </div>
                                <div class="cardCount mt-3">
                                    <div class="row">
                                        <h3>60 /<span style="font-size: large;">102</span> </h3>
                                    </div>                                
                                </div> 

                            </div>
                        </div>
                        <div class="col-md-4 col-xl-2">
                            <div class="countCard">
                                <div class="cardTitle mt-2 ml-2">
                                   Listed Noon
                                </div>
                                <div class="cardCount mt-3">
                                    <div class="row">
                                        <h3>60 /<span style="font-size: large;">102</span> </h3>
                                    </div>                                
                                </div> 

                            </div>
                        </div>
                        <div class="col-md-4 col-xl-2">
                            <div class="countCard">
                                 <div class="cardTitle mt-2 ml-2">
                                  FBN Done
                                </div>
                                <div class="cardCount mt-3">
                                    <div class="row">
                                        <h3>60 /<span style="font-size: large;">102</span> </h3>
                                    </div>                                
                                </div> 

                            </div>
                        </div>
                        <div class="col-md-4 col-xl-2">
                            <div class="countCard">
                                 <div class="cardTitle mt-2 ml-2">
                                    Promotion
                                </div>
                                <div class="cardCount mt-3">
                                    <div class="row">
                                        <h3>60 /<span style="font-size: large;">102</span> </h3>
                                    </div>                                
                                </div> 

                            </div>
                        </div>
                    </div>
                    <br><br>

                </div>

                
                                   
                <div class="viewTable col-md-12">   
                        <div class="row col-md-12 text-center">
                            <h5>All listing Details</h5>
                        </div> 

                        <!-- Filter Sec -->
                        <div class="filter row col-md-12" >
                            <div class="filterSec col-md-6">
                                <div class="row col-md-12">
                                    <div class="statusFilter col-md-6">

                                        <div>
                                            <label>Status </label>   
                                            <!-- <input type="text"> -->
                                            <select class="DropDown" aria-label="Default select example">
                                                <option selected>-- Filter Status --</option>
                                                <option value="prepared for listing">
                                                    <?php echo 'Prepared for listing'; ?>
                                                </option>
                                                <option value="listing submitted">
                                                    <?php echo 'Listing submitted'; ?>
                                                </option>
                                                <option value="listing approved">
                                                    <?php echo 'Listing approved'; ?>
                                                </option>
                                                <option value="listed done on noon">
                                                    <?php echo 'Listed done on noon'; ?>
                                                </option>
                                                <option value="promotion">
                                                    <?php echo 'Promotion'; ?>
                                                </option>
                                                <option value="FBN Done">
                                                    <?php echo 'FBN Done'; ?>
                                                </option>
                                                <option value="S/O Created">
                                                    <?php echo 'S/O Created'; ?>
                                                </option>                                    
                                            </select>  
                                            <!-- <button class="btn btn-info"> filter</button> -->
                                        </div>                                        
                                    </div>

                                    <div class="promoFilter col-md-6">
                                        <div>
                                            <label>Promo </label>   
                                            <!-- <input type="text"> -->
                                            <select class="DropDown" aria-label="Default select example">
                                                    <!-- <option option selected>--Select Promotion Type--</option> -->
                                                    <option selected value=" Filter Promo">
                                                        <?php echo 'Filter Promo'; ?>
                                                    </option>

                                                    <option value="weekly">
                                                        <?php echo 'weekly'; ?>
                                                    </option>
                                                    <option value="11:11">
                                                        <?php echo '11:11'; ?>
                                                    </option>
                                                    <option value="B friday">
                                                        <?php echo 'B friday'; ?>
                                                    </option>
                                                    <option value="Christmas">
                                                        <?php echo 'Christmas'; ?>
                                                    </option>                           
                                                    <option value="Ramadan">
                                                        <?php echo 'Ramadan'; ?>
                                                    </option>                           
                                            </select>     
                                        </div>                                        
                                    </div>
                                </div>
                            </div>

                            <div class="searchSec col-md-6">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-7">
                                        <lable class="mt-2">Search </lable> &nbsp;   
                                        <input type="text">                                            
                                    </div>
                                    <div class="col-md-3 float-right">
                                        <button class="downloadBtn btn btn-info">Download Excel</button>
                                    </div>
                                </div>
                                          
                            </div>
                         </div>
                         <!-- /// -->

                         <!-- Table Sec -->

                         <div class="row col-md-12 d-flex justify-content-center">
                            <div class="tableSec row col-md-12 mt-3">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>ID</th> 
                                            <th>Mark</th>
                                            <th>Status</th>
                                            <th>Promo Type</th>
                                            <th>Partner SKU</th>
                                            <th>Device</th>
                                            <th>Brand</th>
                                            <th><div style="width: 100px;">
                                                    Model
                                                </div></th>
                                            <th>CPU</th> 
                                            <th>Gen</th>
                                            <th>RAM</th>
                                            <th>HDD</th>
                                            <th>QTY</th>
                                            <th>
                                                <div style="width: 100px;">
                                                     Wholesale Price
                                                </div>
                                            </th>
                                            <th>
                                                <div style="width: 100px;">
                                                     Current Noon Price
                                                </div>
                                            </th>
                                            <th>
                                                <div style="width: 100px;">
                                                    Other Noon Price
                                                </div>
                                            </th>
                                            <th>
                                                <div style="width: 100px;">
                                                    Amazon Price
                                                </div>
                                            </th>
                                            <th>
                                                <div style="width: 100px;">
                                                    Cartlow Price
                                                </div> 
                                            </th>
                                            <th>
                                                <div style="width: 100px;">
                                                    Cost with Windows AC
                                                </div> 
                                            </th>                                
                                            <th>
                                                <div style="width: 100px;">
                                                Gross Profit
                                                </div>
                                            </th>                                
                                            <th>
                                            <div style="width: 100px;">
                                                Noon Charges
                                                </div>
                                            </th>                                
                                            <th>
                                            <div style="width: 100px;">
                                                Noon Sale Price
                                                </div>
                                            </th>                                
                                            <th>
                                                <div style="width: 100px;">
                                                Noon Paid
                                                </div>
                                            </th>                                
                                            <th>
                                            <div style="width: 100px;">
                                                Noon Net Profit
                                                </div>
                                            </th>                                
                                            <th>Profit Precentage</th>                                
                                            <th>
                                                <div style="width: 100px;">
                                                Exp Date
                                                </div>
                                            </th>                                
                                            <th>
                                                <div style="width: 100px;">
                                                Created Date
                                                </div>
                                            </th>                                
                                            <th>
                                                <div style="width: 100px;">
                                                Updated Date
                                                </div>
                                            </th>                                
                                            <th>Created By</th>                              
                                            <th><div style="width: 150px;">
                                                Action Buttons
                                                </div>
                                            </th>                              
                                                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                1
                                            </td>                                        
                                            <td>
                                                <input type="checkbox">
                                            </td>
                                            <td>Listing Submited</td>
                                            <td>Weekly</td>
                                            <td>123123131</td>
                                            <td>Laptop</td>
                                            <td>Lenovo</td>
                                            <td>Thinkpad X1 Yoga G1</td>
                                            <td>i5</td>
                                            <td>6th</td>
                                            <td>8GB</td>
                                            <td>256GB</td>
                                            <td>10</td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>                                        
                                            <td>10%</td>
                                            <td>2023-01-30</td>
                                            <td>2023-01-30</td>
                                            <td>2023-01-30</td>
                                            <td>Sales Person 1</td>                                        
                                            <td>
                                                
                                                <div class="row col-md-12">
                                                <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">View</button> -->
                                                    <button class="btn btn-info col-md-3 ml-2" data-toggle="modal" data-target="#myModal"> <i class="fa-solid fa-pen-to-square"></i></button>
                                                    <button class=" btn btn-danger col-md-3 ml-2" ><i class="fa-solid fa-trash"></i></button>
                                                    <button class="btn btn-success col-md-3 ml-2"><i class="fa-solid fa-eye"></i></button>
                                                </div>                                            
                                            </td>                                        
                                        </tr>                                      
                                                

       
                                        <!-- <tr>                                        
                                            <td>
                                                <input type="checkbox">
                                            </td>
                                            <td>Listing Submited</td>
                                            <td>Weekly</td>
                                            <td>123123131</td>
                                            <td>Lenovo</td>
                                            <td>Thinkpad X1 Yoga G1</td>
                                            <td>i5</td>
                                            <td>6th</td>
                                            <td>8GB</td>
                                            <td>256GB</td>
                                            <td>10</td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>                                        
                                            <td>10%</td>
                                            <td>2023-01-30</td>
                                            <td>Sales Person 1</td>                                        
                                        </tr>
                                        <tr>                                        
                                            <td>
                                                <input type="checkbox">
                                            </td>
                                            <td>Listing Submited</td>
                                            <td>Weekly</td>
                                            <td>123123131</td>
                                            <td>Lenovo</td>
                                            <td>Thinkpad X1 Yoga G1</td>
                                            <td>i5</td>
                                            <td>6th</td>
                                            <td>8GB</td>
                                            <td>256GB</td>
                                            <td>10</td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>                                        
                                            <td>10%</td>
                                            <td>2023-01-30</td>
                                            <td>Sales Person 1</td>                                        
                                        </tr>
                                        <tr>                                        
                                            <td>
                                                <input type="checkbox">
                                            </td>
                                            <td>Listing Submited</td>
                                            <td>Weekly</td>
                                            <td>123123131</td>
                                            <td>Lenovo</td>
                                            <td>Thinkpad X1 Yoga G1</td>
                                            <td>i5</td>
                                            <td>6th</td>
                                            <td>8GB</td>
                                            <td>256GB</td>
                                            <td>10</td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>
                                            <td>1000 <span style="font-size: x-small;">AED</span> </td>                                        
                                            <td>10%</td>
                                            <td>2023-01-30</td>
                                            <td>Sales Person 1</td>                                        
                                        </tr> -->                   
                                    
                                    </tbody>
                                </table>                                 
                            </div>      
                            <!--Update model-->
                            <div id="myModal" class="modal fade editModel" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="tableSec row col-md-12">
                                            <table class="table text-center">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>                                                         
                                                        <th>
                                                            <div style="width: 120px;">
                                                                Status
                                                            </div>
                                                        </th>
                                                        <th><div style="width: 100px;">
                                                                Promo Type
                                                            </div></th>
                                                        <th>Partner SKU</th>
                                                        <th>Device</th>
                                                        <th>Brand</th>
                                                        <th>
                                                            <div style="width: 100px;">
                                                                Model
                                                            </div>
                                                        </th>
                                                        <th>CPU</th> 
                                                        <th>Gen</th>
                                                        <th>RAM</th>
                                                        <th>HDD</th>
                                                        <th>QTY</th>
                                                        <th>
                                                            <div style="width: 100px;">
                                                                 Wholesale Price
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div style="width: 100px;">
                                                                 Current Noon Price
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div style="width: 100px;">
                                                                Other Noon Price
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div style="width: 100px;">
                                                                Amazon Price
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div style="width: 100px;">
                                                                Cartlow Price
                                                            </div> 
                                                        </th>
                                                        <th>
                                                            <div style="width: 100px;">
                                                                Cost with Windows AC
                                                            </div> 
                                                        </th>                                
                                                        <th>
                                                            <div style="width: 100px;">
                                                            Gross Profit
                                                            </div>
                                                        </th>                                
                                                        <th>
                                                        <div style="width: 100px;">
                                                            Noon Charges
                                                            </div>
                                                        </th>                                
                                                        <th>
                                                        <div style="width: 100px;">
                                                            Noon Sale Price
                                                            </div>
                                                        </th>                                
                                                        <th>
                                                            <div style="width: 100px;">
                                                            Noon Paid
                                                            </div>
                                                        </th>                                
                                                        <th>
                                                        <div style="width: 100px;">
                                                            Noon Net Profit
                                                            </div>
                                                        </th>                                
                                                        <th>Profit Precentage</th>                                
                                                        <th>
                                                            <div style="width: 100px;">
                                                            Exp Date
                                                            </div>
                                                        </th>                                
                                                        <th>
                                                            <div style="width: 100px;">
                                                            Created Date
                                                            </div>
                                                        </th>                                
                                                        <th>
                                                            <div style="width: 100px;">
                                                            Updated Date
                                                            </div>
                                                        </th>                                
                                                        <th>Created By</th>                              
                                                        <th><div style="width: 100px;">
                                                            Action Buttons
                                                            </div>
                                                        </th>                              
                                                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>                                        
                                                        
                                                        <td><div>
                                                                    <select class="DropDown" aria-label="Default select example">
                                                                    <!-- <option selected>--Select Status--</option> -->
                                                                    <option value="prepared for listing">
                                                                        <?php echo 'Prepared for listing'; ?>
                                                                    </option>
                                                                    <option value="listing submitted">
                                                                        <?php echo 'Listing submitted'; ?>
                                                                    </option>
                                                                    <option value="listing approved">
                                                                        <?php echo 'Listing approved'; ?>
                                                                    </option>
                                                                    <option value="listed done on noon">
                                                                        <?php echo 'Listed done on noon'; ?>
                                                                    </option>
                                                                    <option value="promotion">
                                                                        <?php echo 'Promotion'; ?>
                                                                    </option>
                                                                    <option value="FBN Done">
                                                                        <?php echo 'FBN Done'; ?>
                                                                    </option>
                                                                    <option value="S/O Created">
                                                                        <?php echo 'S/O Created'; ?>
                                                                    </option>                                    
                                                            </select>    
                                                        </div></td>
                                                        <td><div>
                                                            <select class="DropDown" aria-label="Default select example">
                                                                    <!-- <option option selected>--Select Promotion Type--</option> -->
                                                                    <option selected value="None">
                                                                        <?php echo 'None'; ?>
                                                                    </option>

                                                                    <option value="weekly">
                                                                        <?php echo 'weekly'; ?>
                                                                    </option>
                                                                    <option value="11:11">
                                                                        <?php echo '11:11'; ?>
                                                                    </option>
                                                                    <option value="B friday">
                                                                        <?php echo 'B friday'; ?>
                                                                    </option>
                                                                    <option value="Christmas">
                                                                        <?php echo 'Christmas'; ?>
                                                                    </option>                           
                                                                    <option value="Ramadan">
                                                                        <?php echo 'Ramadan'; ?>
                                                                    </option>                           
                                                            </select>   
                                                        </div></td>
                                                        <td>123123131</td>
                                                        <td>Laptop</td>
                                                        <td>Lenovo</td>
                                                        <td>Thinkpad X1 Yoga G1</td>
                                                        <td>i5</td>
                                                        <td>6th</td>
                                                        <td>8GB</td>
                                                        <td>256GB</td>
                                                        <td>
                                                            <div>
                                                                <input type="text" value="10">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <input type="text" value="1000"> 
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <input type="text" value="1000"> 
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <input type="text" value="1000"> 
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <input type="text" value="1000"> 
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <input type="text" value="1000"> 
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <input type="text" value="1000"> 
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <input type="text" value="1000"> 
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <input type="text" value="1000"> 
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <input type="text" value="1000"> 
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <input type="text" value="1000"> 
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <input type="text" value="10%"> 
                                                            </div>
                                                        </td>                                                                                              
                                                        <td>
                                                            <div>
                                                                <input type="text" value="1000"> 
                                                            </div>
                                                        </td>                                                                                              
                                                        
                                                        <td>2023-01-30</td>
                                                        <td>2023-01-30</td>
                                                        <td>2023-01-30</td>
                                                        <td>Sales Person 1</td>                                        
                                                        <td>
                                                            
                                                            <div class="row col-md-12">                                                
                                                                <button class="btn btn-info" >Update</button>
                                                                
                                                            </div>                                            
                                                        </td>                                        
                                                    </tr>                             
                                                </tbody>
                                            </table>                                                                 
                                        </div> 
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ////////// -->
                         </div>  
                            
                    </div>
                
         
        </div>


    </div>
</div>

<?php include_once '../includes/footer.php'; ?>
