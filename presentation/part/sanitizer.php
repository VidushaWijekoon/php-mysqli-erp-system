<div class="col-1 mt-5 text-uppercase text-center">
    <?php
            $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'rack-12'";
            $result_set = mysqli_query($connection, $query);
            foreach($result_set as $a){
            $slot_name = $a['slot_name'];
            $slot_name_change = $a['slot_name']."_0_0_0";
            $part_name= $a['part_name'];
            $part_model= $a['part_model'];
            $qty= $a['qty'];
            foreach($values_single8 as $k => $v){
                
                if($k == $slot_name_change){
                    $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                    $values_single8[$name] = $values_single8[$k];
                    unset($values_single8[$k]);
                }
            }
            }
            $grid11 = createGrid11(1, 25);
            $grid11 = plotGridValues11($grid11, $values_single8);
            echo renderGrid11($grid11,$slot_name_search_m,$search_qty_m,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
            function createGrid11($columns, $rows)
            {
            $grid11 = [];
            $cell = 1;
            for ($r = 0; $r < $rows; $r++) {
                $row = [];
                for ($c = 0; $c < $columns; $c++) {
                    $row[] = $cell++;
                }
                $grid11[] = $row;
            }
            return $grid11;
            }
            function plotGridValues11($grid11, $values_single8)
            {
            foreach ($values_single8 as $value => $coordinates) {
                list($x, $y) = $coordinates;
                $grid11[$y - 1][$x - 1] = $value;
            }
            return $grid11;
            }
            function renderGrid11($grid11 ,$slot_name_search_m,$search_qty_m,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
            {
            $grid11 = array_reverse($grid11); 
            $i =0;
            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_m)) {
             
       ?>
    <div class="col-lg-1 col-md-6 col-sm-10 mt-5  text-uppercase mx-5">
        <div class="card card-primary">
            <div class="card-header" ;>
                <h4 class=" card-title">Rack 12</h4>
            </div>
            <div class="card-body mx-auto justify-content-center mx-auto text-center">
                <?php  foreach ($grid11 as $row) { 
                
                                    foreach ($row as $k=>$v) { 
                                        $substring = explode("_", $v);
                                        //   empty qty 
                                        if($substring[3] == 0){ 
                                            if(empty($test_m)){   ?>
                <!-- // slot name with empty qty -->
                <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                <a class="btn grid_btn bg-secondary mt-2" href="
                                                part_create_form.php?scan_id=<?php echo "rack-12_".$substring[0] ?>">
                    <?php } else { ?>
                    <a class="btn grid_btn bg-secondary mt-2">
                        <?php } ?>

                        <i class="fas fa-inbox"></i>
                        <?php 
                                                    echo $substring[0]."</br>";
                                                    echo "</br>";
                                                    echo "</br>";
                                                    echo "</br>";
                                                        ?>
                    </a>

                    <?php echo "</br>"; } }else{
                                    
                                ?>
                    <!-- slot with value -->
                    <?php if(empty($test_m)){?>
                    <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                    <a class="btn grid_btn bg-success mt-2"
                        href="
                                                    add_additional_part.php?scan_id=<?php echo "rack-12_".$substring[0] ?>">
                        <?php } else { ?>
                        <a class="btn grid_btn bg-success mt-2">
                            <?php } ?>

                            <i class="fas fa-inbox"></i>
                            <?php
                                                    echo $substring[0]."</br>";
                                                    echo $substring[1]."</br>";
                                                    echo $substring[2]."</br>";
                                                    echo $substring[3]."</br>";
                                    ?>
                        </a>
                        <?php }else{ 
                                foreach($test_m as $a){
                                if($substring[0] == $a[0] ){ ?>
                        <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                        <a class="btn grid_btn bg-danger mt-2"
                            href="
                                                    add_additional_part.php?scan_id=<?php echo "rack-12_".$substring[0] ?>">
                            <?php } else { ?>
                            <a class="btn grid_btn bg-danger mt-2">
                                <?php } ?>

                                <i class="fas fa-inbox"></i>
                                <?php
                                                    echo $substring[0]."</br>";
                                                    echo $substring[1]."</br>";
                                                    echo $substring[2]."</br>";
                                                    echo $substring[3]."</br>";
                                                    $substring[0] =5;
                                            ?>
                            </a><?php
                                // echo $a[0]."----".$slot_name_search;
                                // echo "</br>";
                                                } }  ?>


                            <?php  } } } } ?>


            </div>
        </div>
        <?php } } ?>
    </div>