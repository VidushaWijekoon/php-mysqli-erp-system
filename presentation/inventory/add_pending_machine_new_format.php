<?php
ob_start();
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';
?>

<style>
/* Scroll Bar Styles */
/* width */
::-webkit-scrollbar {
    height: 5px;
}

/* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #555;
}

/* ///////////// */

.excelUplorder {
    /* margin-top: 10px; */
    /* margin-left: 10px; */
}

.tableSec {
    overflow-x: auto;
    height: 50vh;
    overflow-y: auto;
    background-color: #6c757d;
}

.detailTable table th {
    text-align: center;
}
</style>


<?php 
 $i=0;
if (isset($_POST['submit'])) {
    echo "inside submit";
    if ($_FILES['file']['name']) {
        $filename = explode('.', $_FILES['file']['name']);
        if ($filename[1] == 'csv') {
            $handle = fopen($_FILES['file']['tmp_name'], 'r');
           echo "file";
            while ($data = fgetcsv($handle)) {
                //handling csv file
                $i++;
                $date = $data[0];
                $supplier_name = $data[1];
                $cci_number = $data[2];
                $alsakb_qr = $data[3];
                $supplier_barcode = $data[4];
                $mfg = $data[5];
                $device = $data[6];
                $brand = $data[7];
                $model = $data[8];
                $series = $data[9];
                $processor = $data[10];
                $core = $data[11];
                $generation = $data[12];
                $speed = $data[13];
                $lcd_size = $data[14];
                $screen_resolution = $data[15];
                $dvd = $data[16];
                $battery = $data[17];
                $notes = $data[18];
                $touch_or_non_touch = $data[19];
                $location = $data[20];
                $finger_print =$data[21];
                $bluetooth = $data[22];
                $camera = $data[23];
                $bios_lock = $data[24];
                $ram = $data[25];
                $hdd_capacity = $data[26];
                $hdd_type = $data[27];
                $graphic_brand = $data[28];
                $graphic_capacity =$data[29];
                $os = $data[30];
                strtolower($device) ;
                strtolower($brand) ;
                strtolower($model);
                strtolower($series);
                strtolower($processor);
                strtolower($core) ;
                strtolower($generation);
                strtolower($speed);
                strtolower($dvd);
                strtolower($battery);
                strtolower($touch_or_non_touch);
                strtolower($finger_print);
                strtolower($bluetooth);
                strtolower($camera);
                strtoupper($bios_lock );
                strtolower($ram);
                strtolower($hdd_capacity);
                strtolower($hdd_type);
                strtolower($graphic_brand);
                strtolower($graphic_capacity);
                strtolower($os);
                $supplier_name = rtrim($supplier_name);
                $cci_number =  rtrim($cci_number);
                $alsakb_qr =  rtrim($alsakb_qr);
                $supplier_barcode = rtrim($supplier_barcode);
                $mfg =  rtrim($mfg);
                $device =  rtrim($device);
                $brand =  rtrim($brand);
                $model =  rtrim($model);
                $series =  rtrim($series);
                $processor =  rtrim($processor);
                $core =  rtrim($core);
                $generation =  rtrim($generation);
                $speed =  rtrim($speed);
                $lcd_size =  rtrim($lcd_size);
                $screen_resolution = rtrim($screen_resolution);
                $dvd =  rtrim($dvd);
                $battery =  rtrim($battery);
                $notes =  rtrim($notes);
                $touch_or_non_touch =  rtrim($touch_or_non_touch);
                $location = rtrim($location);
                $finger_print =  rtrim($finger_print);
                $bluetooth = rtrim($bluetooth);
                $camera =  rtrim($camera);
                $bios_lock =  rtrim($bios_lock);
                $ram =  rtrim($ram);
                $hdd_capacity =  rtrim($hdd_capacity);
                $hdd_type =  rtrim($hdd_type);
                $graphic_brand =  rtrim($graphic_brand);
                $graphic_capacity =  rtrim($graphic_capacity);
                $os = rtrim($os);
              
if($i != 1){
     $sql = strtolower("INSERT INTO machine_from_supplier(`supplier_name`,
     `cci_number`,
     `alsakb_qr_number`,
     `serial_no`,
     `mfg`,
     `device`,
     `brand`,
     `model`,
     `series`,
     `processor`,
     `core`,
     `generation`,
     `speed`,
     `lcd_size`,
     `resolution`,
     `dvd`,
     `battery`,
     `notes`,
     `touch_or_non_touch`,
     `location`,
     `fingerprint`,
     `bluetooth`,
     `camera`,
     `bios_lock`,
     `ram`,
     `hdd_capacity`,
     `hard_disk_type`,
     `graphic_brand`,
     `graphic_capacity`,
     `os`) 
     VALUES('$supplier_name',
                '$cci_number',
                '$alsakb_qr',
                '$supplier_barcode',
                '$mfg',
                '$device',
                '$brand',
                '$model',
                '$series',
                '$processor',
                '$core',
                '$generation',
                '$speed',
                '$lcd_size',
                '$screen_resolution',
                '$dvd',
                '$battery',
                '$notes',
                '$touch_or_non_touch',
                '$location',
                '$finger_print',
                '$bluetooth',
                '$camera',
                '$bios_lock',
                '$ram',
                '$hdd_capacity',
                '$hdd_type',
                '$graphic_brand',
                '$graphic_capacity',
                '$os')");
     
                mysqli_query($connection, $sql);
}
            }
            fclose($handle);
            // echo '<script>alert("File Sucessfully imported")</script>';
            
        }
    }
} ?>


<div class="pageContainer">
    <div class="pageHeader text-center py-2 bg-secondary">
        <h2><i class="fa-solid fa-layer-plus pr-2 pl-2 " style="font-size: 25px;"></i>Add Pending Machine Details</h2>
    </div>
    <div class="pageBody">
        <div class="row col-md-12">
            <!-- uploder Section -->
            <div class="excelUplorder col-md-7">
                <br>
                <div class="row col-md-12">
                    <h5>Upload Detail Sheet Here ..</h5>
                </div>
                <div class="row col-md-12">
                    <div class="uplordBtnSec col-md-12">
                        <!-- <form method="post" enctype="multipart/form-data">
                        <input type="file" name="file">                    
                    </form> -->
                        <form method="post" enctype="multipart/form-data">
                            <label>Select CSV File:</label><br>
                            <input class="btn btn-success mt-2" type="file" name="file">
                            <input class="btn btn-success col-md-3 mt-2" type="submit" name="submit" value="Submit"
                                style="height: 40px;">
                        </form>

                    </div>
                </div>
            </div>
        </div>



        <br>

        <!-- Table Section -->

        <div class="detailTable">
            <div class="text-center pb-4">
                <h4 class="bg-secondary">Details List Table</h4>
            </div>
            <div class="row col-md-12   d-flex justify-content-center">
                <div class="tableSec row col-md-11">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <!-- <th>Serial Number</th> -->
                                <th>Supplier Barcode</th>
                                <th>MFG</th>
                                <th>Device</th>
                                <th>Brand</th>
                                <th>Series</th>
                                <th>Model</th>
                                <th>Processor</th>
                                <th>Core</th>
                                <th>Generation</th>
                                <th>Speed</th>
                                <th>Battery</th>
                                <th>Touch</th>
                                <th>Screen Size</th>
                                <th>Bios Lock</th>
                                <th>Optical</th>
                                <th>Supplier lot Nu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr> -->
                            <?php 
                              
                                // last insert id ganna
                                $last_id = $connection->insert_id;
                                $value = $last_id-($i-2);                                

                                $query = "SELECT * FROM machine_from_supplier WHERE machine_id BETWEEN $value AND $last_id";
                                // echo $query; 
                                // echo $i;                             
                                
                                $result = mysqli_query($connection, $query);
                                foreach($result as $data){ 
                                    // var_dump($data);
                                    ?>
                            <tr>

                                <td><?php echo $data['serial_no'];?></td>
                                <td><?php echo $data['mfg'];?></td>
                                <td><?php echo $data['device'];?></td>
                                <td><?php echo $data['brand'];?></td>
                                <td><?php echo $data['series'];?></td>
                                <td><?php echo $data['model'];?></td>
                                <td><?php echo $data['processor'];?></td>
                                <td><?php echo $data['core'];?></td>
                                <td><?php echo $data['generation'];?></td>
                                <td><?php echo $data['speed'];?></td>
                                <td><?php echo $data['battery'];?></td>
                                <td><?php echo $data['touch_or_non_touch'];?></td>
                                <td><?php echo $data['lcd_size'];?></td>
                                <td><?php echo $data['bios_lock'];?></td>
                                <td><?php echo $data['dvd'];?></td>
                                <td><?php echo $data['supplier_name'];?></td>
                            </tr>

                            <?php }
                                ?>

                            <!-- </tr> -->

                        </tbody>
                    </table>

                </div>

            </div>

        </div>



    </div>
</div>

<?php include_once '../includes/footer.php'; ?>