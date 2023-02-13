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
    .NoonBody{
        padding-left: 20px;
        padding-right: 20px;
        color: black;
    }

    .NoonCreateListingForm{
        display: flex;
        /* color: red; */
        background-color: #f8f9fa;
        box-shadow:0 5px 25px hsl(0deg 0% 78% / 30%);
        justify-content: center;
        /* align-items: center; */
        height: 75  vh;
    }

    #formLable{
        padding-top: 2px;
        font-size: large;
        font-size: 15px;
        padding-top: 2px;
    }

    #formInput{

    }

    #productTitle input[type=text]{
        font-size: medium;
    }

    .DropDown{
        height: 30px;
        width: 83%;
        border-radius: 5px;
        border: 1px solid #f1f1f1;
        /* padding: 0px 10px; */
    }

    .ui-datepicker-calendar {
    display: none;
    }

    .required:after {
    content:" *";
    color:red;
  }

</style>

<div class="container-fluid NoonBody">
    <div class="row col-md-12 pt-2">
        <a href="./e_commerce_dashboard.php"><i class="fa-solid fa-left" style="font-size: 30px; color:#aeacac;"></i></a>
    </div>
    <div class="row col-md-12 mb-3  d-flex justify-content-between"> 
        <div>
            <h3>NOON Listing Page</h3>            
        </div>  
        <div>
            <h5>View Listings &nbsp; <a href="./ecom_noon_view_listing.php"><i class="fa-solid fa-right" style="font-size: 30px; color:#aeacac;"></i></a> </h5>           
        </div>      
    </div>

    <div class="row col-md-12 CreateListing">
        <!-- <div class="btnCreateListing col-md-3">
            <a href="">
                <h5>Create Listing</h5>
            </a>
        </div> -->
        <!-- <div class="btnViewListing col-md-3">   
            <a href="./ecom_noon_view_listing.php">
                <h5>View Listings</h5>
            </a>
        </div> -->
    </div>

    
    <div class="NoonCreateListingForm row col-md-12">
        <div class="row col-md-10">
            <h3 class="text-center mt-3 mb-3">Add Listing Data</h3>
                <form class="row col-md-12" action="" method="$_POST">

                <!--////////////////////// Col 1 /////////////////////////////////-->


                    <div class="col-md-6">
                        <div class="row col-md-12">
                            <div class="col-md-5">
                                <div id="formLable" for="fname">Status </div>
                            </div>
                            <div class="col-md-7">
                                    <select class="DropDown" aria-label="Default select example">
                                            <option selected>--Select Status--</option>
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
                            </div>
                        </div>

                        <div class="row col-md-12 mt-2" >
                            <div class="col-md-5">
                                <div id="formLable" for="">Partner SKU Unique :</div>
                            </div>
                            <div class="col-md-7">
                                <input class="col-md-10" type="text" id="partner_sku" name="" value="" style="height: 30px;" placeholder="Enter SKU" required>                   
                            </div>
                        </div>  
                <!-- Brand -->
                        <div class="row col-md-12 mt-2">
                            <div class="col-md-5">
                                <div class="required" id="formLable" for="">Brand </div>
                            </div>
                            <div class="col-md-7">
                            <?php
                            $query = 'SELECT * FROM `brand`';
                            $query_run = mysqli_query($connection, $query);
                            $brand = '';
                            foreach ($query_run as $data) {
                                $brand .= "<option value=\"{$data['brand']}\">{$data['brand']}</option>";
                            }
                            ?>
                                <select class="DropDown" aria-label="Default select example" name="brand" id="brand" onchange="getProductTitle()" required>
                                        <option value="" selected>--Select brand--</option>
                                                    <?php echo $brand; ?>           
                                </select>                     
                            </div>
                        </div> 

                        <!-- Model -->
                        <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="fname">Model Name (Series) </div>
                                </div>
                                <div class="col-md-7">
                                    <!-- <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" placeholder="Thinkpad">                    -->
                                        <select name="model" id="model" class="DropDown" style="border-radius: 5px;" onchange="getProductTitle()" required>
                                            <option value="" selected>--Select Model--</option>
                                            <option value="thinkpad" >Thinkpad</option>
                                        </select>
                                </div>
                         </div> 
                        
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5 ">
                                    <div class="required" id="formLable" for="">Model Number </div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="model_Number" name="" value="" style="height: 30px;" placeholder="X1 Yoga G1" onchange="getProductTitle()" required>                   
                                </div>
                         </div> 

                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Model Year</div>
                                </div>
                                <div class="col-md-7">
                                <select name="model" id="model" class="DropDown" style="border-radius: 5px;">
                                        <option selected>--Select Year--</option>
                                        <option selected >2014</option>
                                        <option >2009</option>
                                        <option >2010</option>
                                        <option >2011</option>
                                        <option >2012</option>
                                        <option >2013</option>
                                        <option >2014</option>
                                        <option >2015</option>
                                        <option >2016</option>
                                        <option >2017</option>
                                        <option >2018</option>
                                        <option >2019</option>
                                        <option >2019</option>
                                        <option >2020</option>
                                        <option >2021</option>
                                        <option >2022</option>
                                        <option >2023</option>                                     
                                        
                                    </select>
                                    
                                </div>
                         </div> 

                         <!-- ///// -->

                         <!-- processor -->
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="fname">Processor Brand</div>
                                </div>
                                <div class="col-md-7">
                                <!-- <select name="model" id="model" class="DropDown select2" style="border-radius: 5px;"> -->
                                <select name="model" id="processor_brand" class="DropDown" style="border-radius: 5px;" onchange="getProductTitle()" required>
                                       <option value="Intel">Intel</option>                                    
                                       <option value="AMD">AMD</option>                                    
                                    </select>
                                                       
                                </div>
                        </div>

                        <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="fname">Processor Version (Core) </div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" placeholder="i5-6300U" required>                   
                                </div>
                        </div>
                        
                        <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="">Processor Type</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="processor_type" name="" value="" style="height: 30px;" placeholder="core i5" onchange="getProductTitle()" required>                   
                                </div>
                        </div>
                        <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="">Processor Generation</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" placeholder="6th generation" required>                   
                                </div>
                        </div>
                        
                        <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="">Processor Speed (GHz) </div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" >            
                                </div>
                        </div>
                        
                        <!-- <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Processor Speed Unit</div>
                                </div>
                                <div class="col-md-7">
                                    <select name="" id="" class="DropDown">
                                        <option selected value="">GHz</option>
                                        <option value="">MHz</option>
                                    </select>     
                                </div>
                        </div> -->
                        
                        <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="">Number Of Cores</div>
                                </div>
                                <div class="col-md-7">
                                    <select name="" id="" class="DropDown">
                                        <option selected value="">Select Core</option>
                                        <option value="">Dual Core</option>
                                        <option value="">Quad Core</option>
                                    </select>                       
                                </div>
                        </div>   
                        <!-- Graphic Sec 1 -->

                        <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="">Graphic Card</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="graphic_card" name="" value="" style="height: 30px;" placeholder="Nvidia GeForce GTX Series" onclick="getProductTitle()" required>                   
                                </div>
                        </div>   

                        <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="">Graphic Memory (GB) </div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" placeholder="6" required>                   
                                </div>
                        </div>  
                        
                        <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="">Graphic Type</div>
                                </div>
                                <div class="col-md-7" class="">
                                    <select name="" id="" class="DropDown">
                                        <option value="">Select Graphic Type</option>
                                        <option selected value="integrated">integrated</option>
                                        <option value="Graphic Card">Graphic Card</option>
                                    </select>                  
                                </div>
                        </div>  
                       

                        <!-- Screen Sec 1 -->

                          

                          <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="">Display Type </div>
                                        </div>
                                <div class="col-md-7">
                                <select name="" id="" class="DropDown">
                                        <option value="">Select Display Type</option>
                                        <option selected value="LCD">LCD</option>
                                        <option value="LED">LED</option>
                                    </select>                     
                                </div>
                         </div>  
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="fname">Display Resolution </div>
                                </div>
                                <div class="col-md-7">
                                <select name="" id="" class="DropDown" required>
                                        <option value="">Select Display Resolution</option>
                                        <option value="1920 x 1080">1920 x 1080</option>
                                        <option value="1368 x 768">1368 x 768</option>
                                       
                                        <!-- <option value=""></option> -->
                                    </select>                     
                                </div>
                         </div>  

                          <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Pixel Per Inch</div>
                                        </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div>  
                          <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="fname">Screen Size (Inch)</div>
                                </div>
                                <div class="col-md-7">
                                <select name="" id="screen_size" class="DropDown" onchange="getProductTitle()" required>
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
                         <br>
                        <br>                
                    </div>



                 <!--////////////////////// Col 2 /////////////////////////////////-->
                                    
                    <div class="col-md-6">
                        <div class="row col-md-12">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Stock Type</div>
                                </div>
                                <div class="col-md-7">
                                <select class="DropDown" name="" id="stock_type">
                                        <option value="fbn">FBN-Warehouse</option>
                                        <option value="fbp">FBP-DirectShipping</option>                                  
                                                                           
                                    </select>                    
                                </div>
                        </div>   
                        <div class="row col-md-12 mt-2">
                            <div class="col-md-5">
                                <div id="formLable" for="fname">Promo Code :</div>
                            </div>
                            <div class="col-md-7">
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
                            </div>
                        </div>

                        <!-- <div class="row col-md-12 mt-2" >
                            <div class="col-md-5">
                                <div id="formLable" for="fname">Partner SKU Unique :</div>
                            </div>
                            <div class="col-md-7">
                                <input class="col-md-10" type="text" id="" name="" value="" style="height: 30px;" placeholder="Enter SKU">                   
                            </div>
                        </div>   -->

                       
                        

                        <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="fname"> Family </div>
                                        </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type ="text" id="" name="" value="" style="height: 30px;" placeholder="laptop" required>     
                                </div>
                         </div> 

                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Item Condition</div>
                                </div>
                                <div class="col-md-7">
                                <select class="DropDown" name="" id="item_condition" onchange="getProductTitle()">
                                        <option value="New">New</option>
                                        <option value="ReNewed">ReNewed</option>                                        
                                        <option selected value="Refurbished">Refurbished</option>                                        
                                    </select>                    
                                </div>
                            </div>   
                         <!-- <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname"> </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="col-md-10"  id="" name="" value="" style="height: 30px;">         </div>          
                                </div>
                         </div>   -->

                         <!-- //// -->

                         <!-- RAM -->
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="fname">RAM Size (GB) </div>
                                </div>
                                <div class="col-md-7">
                                <select class="DropDown" name="" id="ram" onchange="getProductTitle()" >
                                        <option value="2 GB">2 GB</option>
                                        <option value="8 GB">4 GB</option>                                        
                                        <option selected value="8 GB">8 GB</option>                                        
                                        <option value="16 GB">16 GB</option>                                        
                                        <option value="32 GB">32 GB</option>                                        
                                    </select>                    
                                </div>
                         </div>  
                         <!-- <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">RAM Size Unit </div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="" name="" value="" style="height: 30px;">                   
                                </div>
                         </div>   -->
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="fname">RAM Type </div>
                                </div>
                                <div class="col-md-7">
                                    <select class="DropDown" name="" id="ram_type" required>
                                        <option value="">Select Ram Type</option>
                                        <option value="DDR1">DDR1</option>
                                        <option value="DDR2">DDR2</option>
                                        <option Selected value="DDR3">DDR3</option>
                                        <option value="DDR3L">DDR3L</option>
                                        <option value="DDR4">DDR4</option>
                                        <option value="DDR5">DDR5</option>
                                        
                                    </select>                  
                                </div>
                         </div>  

                         <!-- Hard (internal Memory) -->
                            
                        <div class="row col-md-12 mt-2">
                            <div class="col-md-5">
                                <div class="required" id="formLable" for="">Internal Memory-HDD (GB)</div>
                            </div>
                            <div class="col-md-7">
                                <input class="col-md-10" type="text" id="hdd" name="" value="" style="height: 30px;" onchange="getProductTitle()" required>                   
                            </div>
                        </div>  

                        <!-- <div class="row col-md-12 mt-2">
                            <div class="col-md-5">
                                <div id="formLable" for="fname">Internal Memory Unit</div>
                            </div>
                            <div class="col-md-7">
                                <input class="col-md-10" type="text" id="" name="" value="GB" style="height: 30px;">                   
                            </div>
                        </div>   -->

                       
                        <!-- <div class="row col-md-12 mt-2">
                            <div class="col-md-5">
                                <div id="formLable" for="fname">Storage Type</div>
                            </div>
                            <div class="col-md-7" style="height: 30px;">
                                <div class="col-md-7">
                                    <select class="DropDown" name="" id="">
                                        <option value="" selected>Storage Type</option>
                                        <option value="">SSD</option>
                                        <option value="">SATA</option>                                                                                
                                    </select>                  
                                </div>
                            </div>
                        </div> -->
                        <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="fname">Storage Type </div>
                                </div>
                                <div class="col-md-7">
                                    <select class="DropDown" name="" id="hdd_type" onchange="getProductTitle()" required>
                                        <option value="">Select Storage Type</option>
                                        <option value="SSD">SSD</option>
                                        <option selected value="SATA">SATA</option>
                                        
                                        
                                    </select>                  
                                </div>
                         </div>                        

                         <div class="row col-md-12 mt-2">
                            <div class="col-md-5">
                                 <div id="formLable" for="fname">HDD Rotation </div>
                            </div>
                            <div class="col-md-7" style="height: 30px;">
                                <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">
                            </div>
                        </div>

                    

                         <!-- <div class="row col-md-12 mt-2">
                            <div class="col-md-5">
                                 <div id="formLable" for="fname">HDD Rotation Unit </div>
                            </div>
                            <div class="col-md-7" style="height: 30px;">
                                <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">
                            </div>
                        </div> -->

                         <!-- Empty -->

                         <!-- <div class="row col-md-12 mt-2">
                            <div class="col-md-5">
                                
                            </div>
                            <div class="col-md-7" style="height: 30px;">
                              
                            </div>
                        </div> -->
                         <!-- Empty -->

                         <div class="row col-md-12 mt-2">
                            <div class="col-md-5">
                                
                            </div>
                            <div class="col-md-7" style="height: 30px;">
                              
                            </div>
                        </div>
                         <!-- Empty -->

                         <div class="row col-md-12 mt-2">
                            <div class="col-md-5">
                                
                            </div>
                            <div class="col-md-7" style="height: 30px;">
                              
                            </div>
                        </div>
                         <!-- Empty -->

                         <div class="row col-md-12 mt-2">
                            <div class="col-md-5">
                                
                            </div>
                            <div class="col-md-7" style="height: 30px;">
                              
                            </div>
                        </div>

                          <!-- Graphic Sec 2 -->
                          <div class="row col-md-12 mt-4">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Graphics Card Version</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" placeholder="Nvidia GTX-960">                   
                                </div>
                        </div>   

                          <!-- <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Graphic Memory Unit</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="GB" style="height: 30px;" placeholder="GB">                   
                                </div>
                        </div>    -->
                        <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname"></div>
                                </div>
                                <div class="col-md-7">
                                    <div class="col-md-10" type="" id="formInput" name="" value="" style="height: 30px;" placeholder="">       </div>            
                                </div>
                        </div> 
                         <!-- Empty -->

                         <div class="row col-md-12 mt-2">
                            <div class="col-md-5">
                                
                            </div>
                            <div class="col-md-7" style="height: 30px;">
                              
                            </div>
                        </div>
           
                       

                        <!-- Screen Sec 2 -->                          

                        <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Screen Features (Touch/Non Touch) </div>
                                        </div>
                                <div class="col-md-7">
                                    <select class="DropDown" name="" id="">
                                        <option value="">Select Touch or Non Touch</option>
                                        <option value="Touch">Touch</option>
                                        <option selected value="Non Touch">Non Touch</option>                                       
                                        
                                    </select>                  
                                </div>
                         </div>  
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Display Resolution Type</div>
                                        </div>
                                
                                    <!-- <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" placeholder="HD/FHD">                    -->
                                    <div class="col-md-7">
                                        <select class="DropDown" name="" id="">
                                            <option value="">Select Resolution Type</option>
                                            <option value="">HD</option>
                                            <option value="">FHD</option>                                       
                                            <option value="">QHD</option>    
                                            <option value="">2K</option>    
                                            <option value="">4K</option>                                                
                                        </select>                  
                                </div>
                               
                         </div>                     
                                           
                         <!-- <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Screen SIze Unit</div>
                                 </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" placeholder="">                   
                                </div>
                         </div>                      -->
                    </div>

                    <!-- Pricing Section -->

                         <h5>Pricing</h5>                   
                
                        <div class="row col-md-12">
                            <div class="row col-md-12">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="">QTY</div>
                                    </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" placeholder="Enter Listing Qty" required>                   
                                </div>
                            </div>  
                            <div class="row col-md-12">
                                <div class="col-md-5">
                                    <div class="" id="formLable" for="">E-commerce Inventory Qty</div>
                                    </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" required>                   
                                </div>
                            </div>  
                            <div class="row col-md-12">
                                <div class="col-md-5">
                                    <div class="" id="formLable" for="">Big Inventory Qty</div>
                                    </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" required>                   
                                </div>
                            </div>  

                            <div class="row col-md-12">
                                <div class="col-md-5">
                                    <div class="" id="formLable" for="">Our Wholesale Price <span style="font-size: small;">( AED )</span></div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                  
                                </div>
                            </div>  
                            <div class="row col-md-12">
                                <div class="col-md-5">
                                    <div id="formLable" for="">Our Current Noon Price <span style="font-size: small;">( AED )</span> </div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                            </div>  
                            <div class="row col-md-12">
                                <div class="col-md-5">
                                    <div id="formLable" for="">Other Noon Price <span style="font-size: small;">( AED )</span></div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">               
                                </div>
                            </div>  
                            <div class="row col-md-12">
                                <div class="col-md-5">
                                    <div id="formLable" for="">Amazon Price <span style="font-size: small;">( AED )</span> </div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                            </div>  
                            <div class="row col-md-12">
                                <div class="col-md-5">
                                    <div id="formLable" for="">Cartlow Price <span style="font-size: small;">( AED )</span> </div>
                                </div>
                                <div class="col-md-7">
                                <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                  
                                </div>
                            </div>  
                            <div class="row col-md-12">
                                <div class="col-md-5">
                                    <div id="formLable" for="">Cost With Windows AC <span style="font-size: small;">( AED )</span> </div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                            </div>  

                            <div class="row col-md-12">
                                <div class="col-md-5">
                                    <div id="formLable" for="">gross Profit <span style="font-size: small;">( AED )</span> </div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                            </div>  
                            <div class="row col-md-12">
                            <div class="col-md-5">
                                <div id="formLable" for="">Noon Charges <span style="font-size: small;">( AED )</span> </div>
                            </div>
                            <div class="col-md-7">
                                <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                            </div>
                            </div>  
                            <div class="row col-md-12">
                            <div class="col-md-5">
                                <div id="formLable" for="">Noon Sale Price <span style="font-size: small;">( AED )</span> </div>
                            </div>
                            <div class="col-md-7">
                                <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                            </div>
                            </div>  
                            <div class="row col-md-12">
                            <div class="col-md-5">
                                <div id="formLable" for="">Noon Paid <span style="font-size: small;">( AED )</span> </div>
                            </div>
                            <div class="col-md-7">
                                <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                            </div>
                            </div>                      
                            <div class="row col-md-12">
                            <div class="col-md-5">
                                <div id="formLable" for="">Noon Net Profit <span style="font-size: small;">( AED )</span> </div>
                            </div>
                            <div class="col-md-7">
                                <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                            </div>
                            </div>  
                            <div class="row col-md-12">
                                <div class="col-md-5">
                                    <div id="formLable" for="">Profit Percentage </div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                            </div>  


                    <!-- Pricing Section -->

                    <!-- Part2 Col 1  -->
                    <div class="col-md-6 mt-2">

                        <div class="row col-md-12 mt-2">
                            <div class="col-md-5">
                                <div id="formLable" for="">Recommended Retail Price AE</div>
                            </div>
                            <div class="col-md-7">
                                <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                    
                            </div>
                        </div>  
                        <div class="row col-md-12 mt-2">
                            <div class="col-md-5">
                                <div id="formLable" for="fname">Recommended Retail Price SA</div>
                            </div>
                            <div class="col-md-7">
                                <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                     
                            </div>
                        </div>  
                        <div class="row col-md-12 mt-2">
                            <div class="col-md-5">
                                <div id="formLable" for="fname">Recommended Retail Price EG</div>
                            </div>
                            <div class="col-md-7">
                                <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                     
                            </div>
                        </div>  

                    </div>

                    <!-- Part2 Col 2  -->
                    <div class="col-md-6 mt-2">
                        <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Recommended Retail Price AE Unit</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="" name="" value="" style="height: 30px;">                   
                                </div>
                         </div>  
                        <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Recommended Retail Price SA Unit</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="" name="" value="" style="height: 30px;">                   
                                </div>
                         </div>  
                        <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Recommended Retail Price EG Unit</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="" name="" value="" style="height: 30px;">                   
                                </div>
                         </div>  
                    </div>

                </div>

                    <!-- Other Details -->
                    <!-- <div class="col-md-12"></div> -->

                    <h5 class="row col-md-12 mt-4">Other Details</h5>

                   

                    <!-- col1 -->

                    <div class="col-md-6 mt-2"> 
                        
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="fname">Product Type</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="Laptop" style="height: 30px;" placeholder="White">                   
                                </div>
                         </div>  
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="fname">What's In The Box</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" placeholder="AC Adapter
">                   
                                </div>
                         </div> 
                         <!-- <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Parent Group key</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div>  -->
                         
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Country Of Origin</div>
                                </div>
                                <div class="col-md-7">
                                    <select class="DropDown" name="" id="">
                                        <option value="">Select Country</option>
                                        <option value="">China</option>
                                        <option value="">USA</option>
                                    </select>                  
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="fname">Colour Name</div>
                                </div>
                                <div class="col-md-7">
                                    <select class="DropDown" name="" id="color" onclick="getProductTitle()">
                                        <!-- <option value="">Select Colour</option> -->
                                        <option selected value="Black">Black</option>
                                        <option value="Silver">Silver</option>
                                        <option value="White">White</option>
                                    </select>                  
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Grade</div>
                                </div>
                                <div class="col-md-7">
                                    <select class="DropDown" name="" id="">
                                        <!-- <option value="">Select Grade</option> -->
                                        <option value="">New</option>
                                        <option value="">Recondition</option>
                                        <option value="">Refurbished</option>
                                    </select>                  
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Keyboard Language</div>
                                </div>
                                <div class="col-md-7">
                                <select class="DropDown" name="" id="">
                                        <!-- <option value="">Select Language</option> -->
                                        <option value="">English</option>
                                        <option value="">Arabic</option>
                                    </select>                     
                                </div>
                         </div> 

                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="fname">Operation System</div>
                                </div>
                                <div class="col-md-7">
                                     <select class="DropDown" name="" id="">
                                        <!-- <option value="">Select Operating System</option> -->
                                        <option selected value="windows">Windows</option>
                                        <option value="chrome os">Chrome OS</option>
                                        <option value="linux">Linux</option>
                                        <option value="mac os">Mac OS</option>
                                    </select>                       
                                </div>
                         </div> 
                         <!-- Camera 1 -->

                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Camera Type</div>
                                </div>
                                <div class="col-md-7">
                                     <select class="DropDown" name="" id="">
                                        <option value="">Select Camera Type</option>
                                        <option value="">Primary Camera</option>
                                        <option value="">Secondary Camera</option>                                        
                                    </select>                       
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Primary Camera Resolution</div>
                                </div>
                                <div class="col-md-7">
                                    <select class="DropDown" name="" id="">
                                        <option value="">Select Resolution</option>
                                        <option value="">720P</option>
                                        <option value="">1080P</option>                                        
                                    </select>                   
                                </div>
                         </div> 
                         

                         <!-- Battery -->

                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Average Battery Life</div>
                                </div>
                                <div class="col-md-7">
                                    <select class="DropDown" name="" id="">
                                            <option value="">1 hour</option>                                      
                                            <option value="">2 hour</option>                                      
                                            <option selected value="">3 hour</option>                                      
                                            <option value="">4 hour</option>                                      
                                            <option value="">5 hour</option>                                      
                                     </select>                    
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Battery Size</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" placeholder="">                   
                                </div>
                         </div> 

                         <!--  -->

                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Wireless
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" placeholder="Wireless">                   
                                </div>
                         </div> 
                         
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Number of HDMI Ports
</div>
                                </div>
                                <div class="col-md-7">
                                    <select class="DropDown" name="" id="">
                                            <option selected value="">1 </option>                                      
                                            <option value="">2 </option>                                      
                                                                                 
                                     </select>                         
                                </div>
                         </div> 
                         
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">HDMI Output
</div>
                                </div>
                                <div class="col-md-7">
                                <select class="DropDown" name="" id="">
                                            <option  value="">Yes </option>                                      
                                            <option selected value="">No </option>                                  
                                                                                 
                                     </select>                   
                                </div>
                         </div> 
                         
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Number of USB Ports
</div>
                                </div>
                                <div class="col-md-7">
                                    <select class="DropDown" name="" id="">
                                            <option  value="">1 </option>                                      
                                            <option selected value="">2 </option>                                  
                                            <option selected value="">3 </option>                                  
                                            <option selected value="">4 </option>                            
                                                                                 
                                     </select>                    
                                </div>
                         </div> 
                         
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">SD Card Slot
</div>
                                </div>
                                <div class="col-md-7">
                                <select class="DropDown" name="" id="">
                                            <option  value="">Yes </option>                                      
                                            <option selected value="">No </option>                                  
                                                                                 
                                     </select>                    
                                </div>
                         </div> 
                         
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Feature 1</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Feature 2</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Feature 3</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Feature 4</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Feature 5</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 

                         <!-- product details -->

                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Product Length <span style="font-size: small;">( cm )</span></div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Product Height<span style="font-size: small;">( cm )</span>
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <!-- <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Product Width/Depth
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div>  -->
                         <!-- <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Product Weight
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> -->
                         <!-- Image 1 -->
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="">Image URL 1
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Image URL 3
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Image URL 5
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Image URL 7
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div>

                         <!-- shipping -->

                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Shipping Length<span style="font-size: small;">( cm )</span></div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                            
                         </div>
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Shipping Height<span style="font-size: small;">( cm )</span></div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div>
                         <!-- <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Shipping Width/Depth

</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> -->
                         <!-- <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Shipping Weight

</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> -->
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Shipping Destination</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div>

                         <!-- Monitor -->
                         <br>
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Monitor Response time</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div>
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">HS Code</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div>

                         <div class="row col-md-12 mt-2">
                            <div class="col-md-5">
                                <div id="formLable" for="fname">End Date </div>
                            </div>
                            <div class="col-md-7">
                                <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                            </div>
                        </div>  

                                               

                    </div>

                    <!--//////////////////////////////////// col 2 ////////////////////////////////////////-->

                    <div class="col-md-6 mt-2"> 
                          <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Product Sub Type</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="sub_type" name="" value="" style="height: 30px;" placeholder="notebook" onchange="getProductTitle()">                   
                                </div>
                            </div>  
                          <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">GTIN</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                            </div>  
                        
                          <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Warranty Years</div>
                                </div>
                                <div class="col-md-7">
                                    <select name="" id="" class="DropDown">  
                                        <option value="">3 Months</option>
                                        <option value="">6 Months</option>
                                        <option value="">1 Years</option>
                                        <option value="">2 Years</option>
                                    </select>                   
                                </div>
                            </div>  

                            <!-- Empty -->
                            <!-- <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname"></div>
                                </div>
                                <div class="col-md-7">
                                    <div class="col-md-10" type="" id="formInput" name="" value="" style="height: 30px;">      </div>             
                                </div>
                            </div>   -->


                            <!--  -->
                          
                          <div class="row col-md-12 mt-1">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Colour Family</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" placeholder="Black">                   
                                </div>
                            </div>  
                          <div class="row col-md-12 mt-1">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Usage Type</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                            </div>  
                          <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <!-- <div id="formLable" for="fname">Item Condition</div> -->
                                </div>
                                <div class="col-md-7">
                                    <div class="col-md-10" type="" id="" name="" value="" style="height: 30px;"> </div>        
                                </div>
                            </div>  
    
                          <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div class="required" id="formLable" for="fname">Operation System Version</div>
                                </div>
                                <div class="col-md-7">
                                    <select class="DropDown" name="" id="os_version" onclick="getProductTitle()" required>
                                        <option value="Windows 10 Pro">Windows 10 Pro</option>
                                        <option value="Windows 10 Home">Windows 10 Home</option>
                                        <option value="Windows 10 Education">Windows 10 Education</option>
                                        
                                    </select>                  
                                </div>
                            </div>  
                            
                         <!-- Camera 2 -->
                         <!-- <div class="row col-md-12 mt-2">
                            
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Primary Camera Resolution Unit</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" placeholder="p">                   
                                </div>
                         </div> 
                         <div class="row col-md-12">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Secondary Camera Resolution Unit</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" placeholder="p">                   
                                </div>
                         </div>  -->

                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for=""></div>
                                </div>
                                <div class="col-md-7">
                                    <div class="col-md-10" type="" id="formInput" name="" value="" style="height: 30px;">  </div>                                                      
                                </div>
                         </div> 



                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Secondary Camera Resolution</div>
                                </div>
                                <div class="col-md-7">
                                    <select class="DropDown" name="" id="">
                                        <option value="">Select Resolution</option>
                                        <option value="">720P</option>
                                        <option value="">1080P</option>                                        
                                    </select>                   
                                </div>
                         </div> 

                         <!-- <div class="row col-md-12">
                                <div class="col-md-5">
                                    <div id="formLable" for=""></div>
                                </div>
                                <div class="col-md-7">
                                    <div class="col-md-10" type="" id="formInput" name="" value="" style="height: 30px;">  </div>                                                      
                                </div>
                         </div>  -->
                         

                          <!-- Battery 2 -->
                          <div class="row col-md-12">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Battery Type</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" placeholder="Lithium Ion">                   
                                </div>
                         </div> 
                         <!-- <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Battery Size Unit</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> -->

                         <!--  -->
                         <div class="row col-md-12">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Audio Jack
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Connection Type
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Adobe Flash Compatible</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">SIM Type</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for=""></div>
                                </div>
                                <div class="col-md-7">
                                    <div class="col-md-10" type="" id="formInput" name="" value="" style="height: 30px;">   </div>                
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for=""></div>
                                </div>
                                <div class="col-md-7">
                                    <div class="col-md-10" type="" id="formInput" name="" value="" style="height: 30px;">   </div>                
                                </div>
                         </div> 
                          
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Feature Bullet 1
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Feature Bullet 2
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Feature Bullet 3
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Feature Bullet 4
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Feature Bullet 5
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <!-- Product 2 -->
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Product Width/Depth <span style="font-size: small;">( cm )</span>
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="" name="" value="" style="height: 30px;" placeholder="cm">                   
                                </div>
                         </div>  
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Product Weight <span style="font-size: small;">( kg )</span>

</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="" name="" value="" style="height: 30px;" placeholder="kg">                   
                                </div>
                         </div>  
                         <!-- <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Product Width/Depth Unit

</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" placeholder="cm">                   
                                </div>
                         </div>   -->
                         <!-- <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Product Weight Unit</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;" placeholder="kg">                   
                                </div>
                         </div>   -->

                           <!-- Image 2 -->
                           <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="">Image URL 2
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Image URL 4
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Image URL 6
</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> 
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for=""></div>
                                </div>
                                <div class="col-md-7">
                                    <div class="col-md-10" type="" id="" name="" value="" style="height: 30px;">   </div>                
                                </div>
                         </div>

                         <!-- Shipping 2 -->

                         <div class="row col-md-12 mt-3">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Shipping Width/Depth <span style="font-size: small;">( cm )</span></div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="" name="" value="" style="height: 30px;">                   
                                </div>
                         </div>
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Shipping Weight<span style="font-size: small;">( kg )</span></div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="" name="" value="" style="height: 30px;">                   
                                </div>
                         </div>
                         <!-- <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Shipping Width/Depth Unit

</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div>
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Shipping Weight Unit</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="formInput" name="" value="" style="height: 30px;">                   
                                </div>
                         </div> -->
                         <div class="row col-md-12 mt-2">
                                <div class="col-md-5">
                                    <div id="formLable" for=""></div>
                                </div>
                                <div class="col-md-7">
                                    <div class="col-md-10" type="" id="" name="" value="" style="height: 30px;">     </div>              
                                </div>
                         </div>

                         <!-- Monitor 2 -->
                        <br>
                         <div class="row col-md-12 mt-1">
                                <div class="col-md-5">
                                    <div id="formLable" for="fname">Refresh Rate</div>
                                </div>
                                <div class="col-md-7">
                                    <input class="col-md-10" type="text" id="refreshRate"  name="" value="" style="height: 30px;">                   
                                </div>
                         </div>
                         
                    </div>      
                    
                    <div class="row col-md-12 mt-4">
                    
                                <div class="col-md-3">
                                    <div id="formLable" for="fname">Product Title </div>
                                </div>
                                <div class="col-md-9" id="productTitle">
                                    <input class="col-md-12" type="text" id="product_title" name="" value=""  style="height: 40px;">                   
                                </div>
                    </div> 
                    <div class="row col-md-12 mt-3">
                            <div class="col-md-3">
                                <div id="formLable" for="fname">Long Description </div>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control" id="" rows="3" placeholder="Add Comments of product"></textarea>                   
                            </div>
                        </div> 
                    <br>   
                    <div class="col-md-12 mt-5 mb-5">
                        <button class="btn btn-success col-md-2 float-right" type="submit">Submit</button>
                    </div> 
                    <br><br>
                </form> 

                
        </div>
        

        <br>
               
    </div>
 

</div>



<script>

$(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

    })

    const getProductTitle = () => {
        var item_condition = $('#item_condition').val();
        
        // $('#product_title').val(item_condition);

        var brand = $('#brand').val();
      

        var model = $('#model').val();
      
        var modelNumber = $('#model_Number').val();
        var subType = $('#sub_type').val();
        var screenSize = $('#screen_size').val();
        var processor_brand = $('#processor_brand').val();
        var processor_type = $('#processor_type').val();
        var ram = $('#ram').val();
        var hdd = $('#hdd').val();
        var hdd_type = $('#hdd_type').val();
        var graphic_card = $('#graphic_card').val();
        var os_version = $('#os_version').val();
        var color = $('#color').val();

        console.log(processor_brand);

        $('#product_title').val(item_condition+" "+brand+" "+model+" "+modelNumber+" "+subType+" laptop with "+screenSize+" inch display, "
        +processor_brand+" "+processor_type+" processor "+ram+" RAM "+hdd+"GB "+hdd_type+" "+graphic_card+" "+os_version+" "+color) ;


    }

   
</script>


<?php include_once '../includes/footer.php'; ?>
