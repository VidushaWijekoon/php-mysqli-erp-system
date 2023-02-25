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

</style>

<div class="packingStartBody">
    <div class="row packingStartHeadingSec">
        <div class="packingStartHeading">
            <p>Packing Finish</p>
        </div>
        <div class="">
                hdjshfkjh
        </div>

    </div>

    <div class="packingStartContentSec">
        <br>
        <div class="row" style="width: 100%;">
            <div class="col-md-6 text-center">
                <h3>Final Product Photo</h3>
            </div>
            <div class="col-md-6 text-center">
                <h3>Printing</h3>
            </div>
        </div>
        
        <br>
        <div class="row" style="width:100%">
            <div class="col-md-6 p-4" >
                <div class="row d-flex justify-content-center" >
                    <img class="img-fluid" src="./images/packing 1.jpg"  style="height:200px" alt="">
                </div>
                <br>
                <div class="row d-flex justify-content-center" style="width:100%">
                    <img class="img-fluid" src="./images/laptopbox.jpg" style="height:200px" alt="">                    
                </div>
                <br>
                <div class="row d-flex justify-content-center">
                    <button class="btn btn-success" type="submit">Complete Packing</button>
                </div>                
            </div>
            
            <div class="col-md-6" style="height:200px;">
                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        <p>Title : Lenovo Thinkpad T460 intel i5-3100U 2.80Ghz Laptop</p>
                        <p>Display 14 inch Diagonal LCD Display </p>
                        <p>256GB SSD Disk </p>

                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <a href="./packingList.php" target="_blank">
                        <button class="btn btn-success"> Print </button>
                    </a>
                </div>             
            </div>
        </div>
        <br>
        <br>
        
        <br>            
    </div>
    <br>

    <div class="packingStartContentSec">
        

        <div class="row">
            <div>
                <h4>Print the Packing List</h4>
                
            </div>
            
            
        </div>
    </div>


</div>


<?php include_once('../includes/footer.php'); ?>