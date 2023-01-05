<?php 

    function dataItemsRetrive(){ 

    // Order Items
    $device = null;
    $brand = null;
    $model = null;
    $processor = null;
    $core = null;
    $generation = null;
    $speed = null;
    $lcd_size = null;
    $resolution = null;
    $touch_or_non_touch = null;
    $ram = null;
    $hdd_capacity = null;
    $hdd_type = null;
    $graphic_capacity = null;
    $graphic_type = null;
    $os = null;
    $condition = null;
    $selling_type = null;
    $charger = null;
    $packing_type = null;
    $shipping_method = null;
    $qty = null;
    $unit_price = null;
    $discount = null;
    $total = null;
    $quatation_id = null;
        
    $mysqli = new mysqli('localhost', 'root', '', 'wms');
    $quatation_id = mysqli_real_escape_string($mysqli, $_GET['quatation_id']);

    
?>


<table class="table table-dark text-uppercase" id="tbl">
    <thead>
        <tr style="font-size: 9px;">
            <th>Device</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Processor</th>
            <th>Core</th>
            <th>Generation</th>
            <th>Speed</th>
            <th>Screen Size</th>
            <th>Resolution</th>
            <th>Touch</th>
            <th>RAM</th>
            <th>HDD Capacity</th>
            <th>HDD Type</th>
            <th>Ghrphic Capacity</th>
            <th>Ghrphic Brand</th>
            <th>OS</th>
            <th>Condition</th>
            <th>Selling Type</th>
            <th>Charger</th>
            <th>Packing Type</th>
            <th>Shipping Type</th>
            <th>QTY</th>
            <th>Unit Price</th>
            <th>Discount</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>

        <?php 

            $query_d = "SELECT * FROM sales_quatation_items WHERE quatation_id = $quatation_id  ORDER BY sales_quatations_items_id DESC";
            $qd = mysqli_query($mysqli, $query_d);

            if(empty($qd)){}else{

                foreach($qd as $qd){
                    $device = $qd['device'];
                    $brand = $qd['brand'];
                    $model = $qd['model'];
                    $processor = $qd['processor'];
                    $core = $qd['core'];
                    $generation = $qd['generation'];
                    $speed = $qd['speed'];
                    $lcd_size = $qd['lcd_size'];
                    $resolution = $qd['resolution'];
                    $touch_or_non_touch = $qd['touch_or_non_touch'];
                    $ram = $qd['ram'];
                    $hdd_capacity = $qd['hdd_capacity'];
                    $hdd_type = $qd['hdd_type'];
                    $graphic_capacity = $qd['graphic_capacity'];
                    $graphic_type = $qd['graphic_type'];
                    $os = $qd['os'];
                    $condition = $qd['conditions'];
                    $selling_type = $qd['selling_type'];
                    $charger = $qd['charger'];
                    $packing_type = $qd['packing_type'];
                    $shipping_method = $qd['shipping_method'];
                    $qty = $qd['qty'];
                    $unit_price = $qd['unit_price'];
                    $discount = $qd['discount'];
                    $total = $qd['total'];                                                                           
        ?>
        <tr style="font-size: 9px;">
            <td><?php echo $device; ?></td>
            <td><?php echo $brand; ?></td>
            <td><?php echo $model; ?></td>
            <td><?php echo $processor; ?></td>
            <td><?php echo $core; ?></td>
            <td><?php echo $generation; ?></td>
            <td><?php echo $speed; ?></td>
            <td><?php echo $lcd_size; ?></td>
            <td><?php echo $resolution; ?></td>
            <td><?php echo $touch_or_non_touch; ?></td>
            <td><?php echo $ram; ?></td>
            <td><?php echo $hdd_capacity; ?></td>
            <td><?php echo $hdd_type; ?></td>
            <td><?php echo $graphic_capacity; ?></td>
            <td><?php echo $graphic_type; ?></td>
            <td><?php echo $os; ?></td>
            <td><?php echo $condition; ?></td>
            <td><?php echo $selling_type; ?></td>
            <td><?php echo $charger; ?></td>
            <td><?php echo $packing_type; ?></td>
            <td><?php echo $shipping_method; ?></td>
            <td><?php echo $qty; ?></td>
            <td><?php echo $unit_price; ?></td>
            <td><?php echo $discount; ?></td>
            <td><?php echo $total; ?></td>
        </tr>
        <?php } } ?>
    </tbody>
</table>
<?php } ?>