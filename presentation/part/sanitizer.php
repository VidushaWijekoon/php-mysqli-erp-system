 <!-- rack-07 -->

 <div class="col-1 mt-5 text-uppercase text-center">
     <?php
            $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'rack-8'";
            $result_set = mysqli_query($connection, $query);
            foreach($result_set as $a){
            $slot_name = $a['slot_name'];
            $slot_name_change = $a['slot_name']."_0_0_0";
            $part_name= $a['part_name'];
            $part_model= $a['part_model'];
            $qty= $a['qty'];
            foreach($values_single4 as $k => $v){
                
                if($k == $slot_name_change){
                    $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                    $values_single3[$name] = $values_single3[$k];
                    unset($values_single3[$k]);
                }
            }
            }
            $grid7 = createGrid7(1, 25);
            $grid7 = plotGridValues7($grid7, $values_single4);
            echo renderGrid7($grid7,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i);
            function createGrid7($columns, $rows)
            {
            $grid7 = [];
            $cell = 1;
            for ($r = 0; $r < $rows; $r++) {
                $row = [];
                for ($c = 0; $c < $columns; $c++) {
                    $row[] = $cell++;
                }
                $grid7[] = $row;
            }
            return $grid7;
            }
            function plotGridValues7($grid7, $values_single4)
            {
            foreach ($values_single4 as $value => $coordinates) {
                list($x, $y) = $coordinates;
                $grid7[$y - 1][$x - 1] = $value;
            }
            return $grid7;
            }
            function renderGrid7($grid7 ,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i)
            {
            $grid7 = array_reverse($grid7); 
            $i =0;
            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h)&& empty($test_i)) || !empty($test_i)) {
             
       ?>
     <div class="card card-primary">
         <div class="card-header" ;>
             <h4 class=" card-title">Rack 08</h4>


         </div>
         <div class="card-body mx-auto justify-content-center mx-auto text-center">
             <?php  foreach ($grid7 as $row) { 
                
                foreach ($row as $k=>$v) { 
                    $substring = explode("_", $v);
                    //   empty qty 
                    if($substring[3] == 0){ ?>
             <!-- // slot name with empty qty -->
             <?php if($role_id == 4 && $department ==20){ ?>
             <a class="btn grid_btn bg-secondary mt-2" href="
                            part_create_form.php?scan_id=<?php echo "rack-8_".$substring[0] ?>">
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

                 <?php echo "</br>"; }else{
                 
               ?>
                 <!-- slot with value -->
                 <?php if(empty($test_i)){?>
                 <?php if($role_id == 4 && $department ==20){ ?>
                 <a class="btn grid_btn bg-success mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-8_".$substring[0] ?>">
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
            foreach($test_i as $a){
               if($substring[0] == $a[0] ){ ?>
                     <?php if($role_id == 4 && $department ==20){ ?>
                     <a class="btn grid_btn bg-danger mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-8_".$substring[0] ?>">
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