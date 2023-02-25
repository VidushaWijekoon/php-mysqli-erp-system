
<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../includes/header.php';

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
?>

<style>

    .cardBody{
        display: flex;
        /* color: red; */
        background-color: #f8f9fa;
        box-shadow:0 5px 25px hsl(0deg 0% 78% / 30%);
        /* justify-content: center; */
        /* align-items: center; */
        /* height: 100vh; */

    }

    .platformes{
        display: flex;
        justify-content: space-between;

    }

    .formSec{
        margin-left: 100px;
    }

    .myDiv{
        display:none;
        padding:10px;
    }

    .DropDown{
        height: 30px;
        width: 83%;
        border-radius: 5px;
        border: 1px solid #f1f1f1;
        /* padding: 0px 10px; */
    }

    .inputSec input{
        height: 30px;
    }

    input[type=radio] {    
    height: 15px;
    width: 15px;
}


</style>
<div class="container-fluid createOrder">
    <div class="row col-md-12 pt-2">
        <a href="./e_commerce_dashboard.php"><i class="fa-solid fa-left" style="font-size: 30px; color:#aeacac;"></i></a>
    </div>
    <div class="row">
        <div class="col-md-12 pt-3 mb-3"> 
            <div>
                <h3>Create Order</h3>            
            </div>            
        </div>

        <div class="CreateOrderForm col-md-12">
            <div class="row cardBody">
                <form class="" action="" method="$_POST">
                    <div class="row formSec">
                        <div class="col-md-12">
                            <div class="row col-md-12 mt-4">
                                <h5>Select Customer</h5>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <p>Select platform</p>  
                                </div>
                                <div class="platformes col-md-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="platform" id="noon" value="One" onclick="setNoonShippingMethod()">
                                        <label class="form-check-label pt-1" for="noon">
                                            <b>NOON</b> 
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="platform" id="cartlaw" value="Two" onclick="setCartLawShippingMethod()" >
                                        <label class="form-check-label pt-1" for="cartlaw">
                                            <b>Cartlaw</b>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="platform" id="amazon" value="Three" >
                                        <label class="form-check-label pt-1" for="amazon">
                                            <b>Amazon.com</b>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="platform" id="amazonuae" value="Four" >
                                        <label class="form-check-label pt-1" for="amazonuae">                                            
                                            <b>Amazon.ae</b>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-3" style="padding-top: 17px;">Select Type </div>
                                <div class="Types col-md-8">
                                    <div class="myDiv" id="showOne">                                    
                                            <select name="" id="" class="DropDown">
                                                <option selected value="FBN">FBN - Warehouse</option>
                                                <option value="FBP">FBP - DirectShipping</option>
                                            </select> 
                                    </div>
                                    <div class="myDiv" id="showTwo">
                                            <select name="" id="" class="DropDown">                                        
                                                <option selected value="DirectShipping">FBC</option>                                            
                                            </select> 
                                    </div>
                                    <div class="myDiv" id="showThree">
                                            <select name="" id="" class="DropDown">                                        
                                                <option selected value="FBA">FBA - Warehouse</option>                                            
                                            </select>                               
                                    </div>
                                    <div class="myDiv" id="showFour">
                                            <select name="" id="" class="DropDown">
                                                <option selected value="FBA">FBA - Warehouse</option>
                                                <option value="DirectShipping">Direct Shipping</option>
                                            </select> 
                                    </div>          
                                </div>
                            </div>


                        </div>

                        <div class="col-md-12 pl-5">
                            <div class="row mt-4">
                                <h5>Order Details</h5>
                            </div>

                            <div class="row mt4">
                                <div class="row col-md-6">
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Order Number</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                        <input type="text" style="width: 82%;" placeholder="ABC12345">
                                    </div>                                    
                                </div>


                            </div>

                            <div class="row col-md-12 mt-4">
                                <div class="row col-md-6">
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Device</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                        <select name="" id="" class="DropDown">
                                            <option value="" selected>--Select Device--</option>
                                            <option value="laptop">Laptop</option>
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="row col-md-6" >
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Brand</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                    <?php
                                    $query = 'SELECT * FROM `brand`';
                                    $query_run = mysqli_query(
                                        $connection,
                                        $query
                                    );
                                    $brand = '';
                                    foreach ($query_run as $data) {
                                        $brand .= "<option value=\"{$data['brand']}\">{$data['brand']}</option>";
                                    }
                                    ?>
                                <select class="DropDown" aria-label="Default select example" name="brand" id="brand" required>
                                        <option value="" selected>--Select brand--</option>
                                                    <?php echo $brand; ?>           
                                </select>  
                                    </div> 
                                </div>
                            </div>                
                            <div class="row col-md-12 mt-4">
                                <div class="row col-md-6">
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Model</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                        <select name="model" id="model" class="DropDown" required>
                                            <option value="" selected>--Select Model--</option>
                                            <option value="thinkpad" >Thinkpad</option>
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="row col-md-6" >
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Processor</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                    <select name="model" id="processor_brand" class="DropDown" style="border-radius: 5px;" required>
                                       <option value="Intel">Intel</option>                                    
                                       <option value="AMD">AMD</option>                                    
                                    </select>
                                    </div> 
                                </div>
                            </div>                
                            <div class="row col-md-12 mt-4">
                                <div class="row col-md-6">
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Core</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                    <select class="DropDown" name="" id="">
                                        <option value="">Select Core</option>
                                        <option value=""></option>
                                                                      
                                    </select>
                                    </div>                                    
                                </div>
                                <div class="row col-md-6" >
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Generation</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                    <select class="DropDown" name="" id="">
                                        <option value="">Select Gen</option>
                                        <option value=""></option>
                                                                      
                                    </select>
                                    </div> 
                                </div>
                            </div>                
                            <div class="row col-md-12 mt-4">
                                <div class="row col-md-6">
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Speed</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                    <select class="DropDown" name="" id="">
                                        <option value="">Select Speed</option>
                                        <option value=""></option>
                                                                      
                                    </select>
                                    </div>                                    
                                </div>
                                <div class="row col-md-6" >
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Touch</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                    <select class="DropDown" name="" id="">
                                        <option value="">Select Touch or Non Touch</option>
                                        <option value="Touch">Touch</option>
                                        <option selected value="Non Touch">Non Touch</option>                                       
                                        
                                    </select>   
                                    </div> 
                                </div>
                            </div>                
                            <div class="row col-md-12 mt-4">
                                <div class="row col-md-6">
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Screen Size</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                    <select name="" id="screen_size" class="DropDown" required>
                                        <option value="">Select Screen Size</option>
                                        <option value="11.6">11.6</option>
                                        <option value="12">12</option>
                                        <option value="13.3">13.3</option>
                                        <option value="14">14</option>
                                        <option value="15.6">15.6</option>
                                        <option value="17.3">17.3</option>
                                       
                                        <!-- <option value=""></option> -->
                                    </select>    
                                    </div>                                    
                                </div>
                                <div class="row col-md-6" >
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Resolution</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                     <select name="" id="" class="DropDown" required>
                                        <option value="">Select Display Resolution</option>
                                        <option value="1920 x 1080">1920 x 1080</option>
                                        <option value="1368 x 768">1368 x 768</option>
                                       
                                        <!-- <option value=""></option> -->
                                    </select>  
                                    </div> 
                                </div>
                            </div>                
                            <div class="row col-md-12 mt-4">
                                <div class="row col-md-6">
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>HDD Type  </p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                        <select class="DropDown" name="" id="hdd_type" onchange="" required>
                                            <option value="">Select Storage Type</option>
                                            <option value="SSD">SSD</option>
                                            <option selected value="SATA">SATA</option>                                           
                                            
                                        </select>   
                                    </div>                                    
                                </div>
                                <div class="row col-md-6" >
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>HDD Capacity</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                        <input type="text" style="width: 80%;" placeholder="256 GB">
                                    </div> 
                                </div>
                            </div>                
                            <div class="row col-md-12 mt-4">
                                <div class="row col-md-6">
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Ram</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                        <select class="DropDown" name="ram">
                                                        <option selected="">--Select Ram--</option>
                                                        <option value="2">2GB</option>
                                                        <option value="4">4GB</option>
                                                        <option value="8">8GB</option>
                                                        <option value="16">16GB</option>
                                                        <option value="32">32GB</option>
                                                        <option value="64">64GB</option>
                                                    </select>
                                    </div>                                    
                                </div>
                                <div class="row col-md-6" >
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>OS</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                    <select class="DropDown" name="" id="">
                                        <!-- <option value="">Select Operating System</option> -->
                                        <option selected value="windows">Original Windows 10 Pro</option>
                                        <option value="chrome os">Chrome OS</option>
                                        <option value="linux">Linux</option>
                                        <option value="mac os">Mac OS</option>
                                    </select>  
                                    </div> 
                                </div>

                                <div class="row col-md-12 mt-4">
                                <div class="row col-md-6">
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Inventory Location</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                        <select class="DropDown " name="packing_type">
                                            <option selected="">--Select Inventory--</option>
                                            <option value="ecom_inventory">E-Commerce Inventory</option>
                                            <option value="big_inventory">Big Inventory</option>
                                        </select>
                                    </div> 
                                    <!-- <div class="lableSec pt-2 col-md-1">
                                       <a href="./ecom_stock_cheking.php" target="_blank"><i class="fa-solid fa-magnifying-glass-location" style="font-size: 20px; margin-top:-20px"></i></a>
                                    </div>                                     -->
                                </div>
                                <div class="row col-md-6" >
                                   
                                    
                                </div>
                            </div>      

                            </div>

                                  <!--///////////////  -->
                          <div class="pt-2 pb-3" style="background-color: #e4e4e4; border-radius:5px;">           
                            <div class="row col-md-12 mt-4">
                                <div class="row col-md-6">
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Graphic Brand</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                        <select class="DropDown" name="graphic_type">
                                                        <option selected="">--Select Graphic Type--</option>
                                                        <option value="intel">Intel</option>
                                                        <option value="amd">Amd</option>
                                                        <option value="nvidia">nVidia</option>
                                                        <option value="mix">Mix</option>
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="row col-md-6" >
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Graphic Capacity</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                        <select class="DropDown" name="graphic_capacity">
                                                        <option selected="">--Select Graphic Capacity--</option>
                                                        <option value="1">1GB</option>
                                                        <option value="2">2GB</option>
                                                        <option value="4">4GB</option>
                                                        <option value="6">6GB</option>
                                                        <option value="8">8GB</option>
                                                        <option value="mix">Mix</option>
                                                        <option value="n/a">N/A</option>
                                                    </select>
                                    </div> 
                                </div>
                            </div>                
                            <div class="row col-md-12 mt-4">
                                <div class="row col-md-6">
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Condition</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                        <select class="DropDown" name="condition">
                                                            <option selected="">--Select Condition--</option>
                                                            <option value="fully refurbished" title="A B C D Painting, LCD No Scratch, Battery Health 80%">
                                                                Fully Refurbished-A B C D Painting, LCD No Scratch, Battery Health 80%</option>
                                                            <option value="a grade" title="A B C D Small Scratch, No Dent, LCD Small Scratch, Battery Health 60%">
                                                                A Grade-A B C D Small Scratch, No Dent, LCD Small Scratch, Battery Health 60%</option>
                                                        </select>
                                    </div>                                    
                                </div>
                                <div class="row col-md-6" > 
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Charger</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                                <select class="DropDown" name="charger">
                                                        <option selected="">--Select Charger Type--</option>
                                                        <option value="us">US Standard</option>
                                                        <option value="uk">UK Standard</option>
                                                        <option value="eu">EU Standard</option>
                                                        <option value="unos">No Charger</option>
                                                    </select>
                                    </div> 
                                </div>
                            </div>                
                            <div class="row col-md-12 mt-4">
                                <div class="row col-md-6">
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Packing Type</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                        <select class="DropDown " name="packing_type">
                                                        <option selected="">--Select Packing Type--</option>
                                                        <option value="single box">Single Box</option>
                                                        <option value="bulk packing">Bulk Packing</option>
                                                    </select>
                                    </div>                                    
                                </div>
                                <div class="row col-md-6" >
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Shipping Method</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9" id="shipping">
                                                    <select class="DropDown" name="shipping_method" id="shipping_method">
                                                                                                               
                                                    </select>
                                    </div> 
                                </div>
                            </div>                
                            <div class="row col-md-12 mt-4">
                                <div class="row col-md-6">
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>QTY</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                        <input type="text" style="width: 80%;" placeholder="Enter Listing Qty">
                                    </div>                                    
                                </div>
                                <div class="row col-md-6" >
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Unit Price</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                        <input type="text" style="width: 80%;" placeholder="Enter Unit Price">
                                    </div> 
                                </div>
                            </div>                
                            <div class="row col-md-12 mt-4">
                                <div class="row col-md-6">
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Discount</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                        <input type="text" style="width: 80%;" placeholder="Enter Discount %">
                                    </div>                                    
                                </div>
                                <div class="row col-md-6" >
                                    <div class="lableSec pt-2 col-md-3">
                                       <p>Total</p> 
                                    </div>                                    
                                    <div class="inputSec col-md-9">
                                        <input type="text" style="width: 80%;">
                                    </div> 
                                </div>
                            </div>      
                           
                            </div>          
              
                        </div>

                        <div class="mr-5 mt-5 mb-5" style="width: 100%;">
                            <button class="btn btn-success col-md-2 float-right" type="submit">Submit</button>
                        </div>                           
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
    	var demovalue = $(this).val(); 
        $("div.myDiv").hide();
        $("#show"+demovalue).show();
    });
});

const setNoonShippingMethod = () =>{
    var radiobox = document.getElementById("noon");    
    
    if(radiobox.checked == true){
        
        var html=document.getElementById("shipping_method").innerHTML +="<option value='noon_warehouse'>Noon Pickup</option> <option value='deliver_noon_warehouse'>Deliver to Noon Warehouse</option>"; 
        console.log(html)      
    }
}
const setCartlawShippingMethod = () =>{
    var radiobox = document.getElementById("cartlaw"); 
    var text = document.getElementById("shipping_method");   
    
    if(radiobox.checked == true){
        // text.style.display = "none";
        var html=document.getElementById("shipping_method").innerHTML +="<option value=''>Cartlaw Pickup</option>";             
    }
}
</script>

<?php include_once '../includes/footer.php'; ?>
