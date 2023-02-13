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

    .stockCheckBody{
        padding: 20px 30px;

    }
    .stockChekHeadingSec{
        font-size: 30px;
        font-weight: 700;

    }

    .stockChekContentSec{
        border: #f8f9fa 1px;
        border-radius: 5px;
        padding: 10px;
        background-color: #fff;
        box-shadow:0 5px 25px hsl(0deg 0% 78% / 30%);
    }

    .orderDetailTable{
        height: 250px;
        padding: 20px;
        background-color: #fff;
    }
    .orderDetailTable th{
        color: #168eb4;
    }
    .orderDetailTable{
        width: 100%;
        overflow-x: auto;
    }

    input[type=text ]{
        height: 25px;
    }
    .searchForm p{
        padding-top: 8px;
    }

    .DropDown{
        height: 30px;
        width: 20%;
        border-radius: 5px;
        border: 1px solid #f1f1f1;
        /* padding: 0px 10px; */
    }


</style>

<div class="stockCheckBody">

    <div class="row stockChekHeadingSec">
        <div class="orderHeading">
            <p>Stock Details Cheking</p>
        </div>
        
    </div>

    <div class="stockChekContentSec">

        <div class="seachSec">
            <div class="searchForm">
                <form action="" method="post">
                    <h4>Search </h4>
                    <br>
                    <div class="row pl-4" style="width: 100%;">
                        <div class="row col-md-3">
                            <p class="mr-3">Model</p>
                            <input type="text">
                        </div>
                        <div class="row col-md-3">
                            <p class="mr-3">Core</p>
                            <input type="text">
                        </div>
                        <div class="row col-md-3">
                            <p class="mr-3">Generation</p>
                            <input type="text">
                        </div>
                        <div class="row col-md-3">
                            <p class="mr-3">Touch / Non Touch</p>
                            <select class="DropDown" name="" id="" >
                                <option value="">Select</option>
                                <option value="touch">Touch</option>
                                <option value="non_touch">Non Touch</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div style="padding-right: 220px;">
                        <button class="btn btn-success ml-5" type="submit" >Search</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Result Sec -->

        <div class="resultSec">

             <div class="orderDetailTable tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <table class="table table-hover">
                    <thead style="background-color: #fff;">
                        <tr>
                        <th scope="col">#</th>                        
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
                        <th scope="col">Graphic Brand</th>
                        <th scope="col">Graphic Capacity</th>  
                        <th scope="col">QTY</th>
                        <th scope="col">Location</th>                      
                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th style="color:black">1</th>
                            
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
                            
                            <td>Nvidia</td>
                            <td>4GB</td>
                            
                            <td>15</td>
                            <td>Ecommerce Warehouse</td>
                        </tr>
                      
                        
                    </tbody>
                    </table>               




            </div>
            
        </div>

    </div>




</div>


<?php include_once('../includes/footer.php'); ?>