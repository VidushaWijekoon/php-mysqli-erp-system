<?php
        
        $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'RACK-18'";
        $result_set = mysqli_query($connection, $query);
        foreach($result_set as $a){
        $slot_name = $a['slot_name'];
        $slot_name_change = $a['slot_name']."_0_0_0";
        $part_name= $a['part_name'];
        $part_model= $a['part_model'];
        $qty= $a['qty'];
        foreach($values6 as $k => $v){
            
            if($k == $slot_name_change){
                $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                $values6[$name] = $values6[$k];
                unset($values6[$k]);
            }
        }
        }
        $grid18 = createGrid18(5, 20);
        $grid18 = plotGridValues18($grid18, $values6);
        echo renderGrid18($grid18,$slot_name_search_C,$search_qty_C,$common_slot,$test_c,$role_id,$department,$test, $test_b,$test_d,$test_e,$test_g,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
        function createGrid18($columns, $rows)
        {
        $grid18 = [];
        $cell = 1;
        for ($r = 0; $r < $rows; $r++) {
            $row = [];
            for ($c = 0; $c < $columns; $c++) {
                $row[] = $cell++;
            }
            $grid18[] = $row;
        }
        return $grid18;
        }
        function plotGridValues18($grid18, $values6)
        {
        foreach ($values6 as $value => $coordinates) {
            list($x, $y) = $coordinates;
            $grid18[$y - 1][$x - 1] = $value;
        }
        return $grid18;
        }
        function renderGrid18($grid18 ,$slot_name_search_c,$search_qty_c,$common_slot,$test_c,$role_id,$department,$test, $test_b,$test_d,$test_e,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
        {
        $grid18 = array_reverse($grid18); 
        $i =0;
        if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_q)) {  
        
   ?>
<div class="col-4 mt-5 text-uppercase">
    <div class="card card-primary">
        <div class="card-header" ;>
            <h4 class=" card-title">Rack 18</h4>


        </div>
        <div class="card-body mx-auto justify-content-center mx-auto text-center">
            <?php  foreach ($grid18 as $row) { 
            
            foreach ($row as $k=>$v) { 
                $substring = explode("_", $v);
                //   empty qty 
                if($substring[3] == 0){ ?>
            <!-- // slot name with empty qty -->
            <?php 
                if(empty($test_c)){
                if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
            <a class="btn grid_btn bg-secondary mt-2" href="
                        part_create_form.php?scan_id=<?php echo "rack-18_".$substring[0] ?>">
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
                <?php } }else{
             
           ?>
                <!-- slot with value -->
                <?php if(empty($test_c)){?>
                <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                <a class="btn grid_btn bg-success mt-2" href="
                            add_additional_part.php?scan_id=<?php echo "rack-18_".$substring[0] ?>">
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
        foreach($test_c as $a){
           if($substring[0] == $a[0] ){ ?>
                    <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                    <a class="btn grid_btn bg-danger mt-2" href="
                            add_additional_part.php?scan_id=<?php echo "rack-18_".$substring[0] ?>">
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
       } }?>


                        <?php  } } } } ?>


        </div>
    </div>
    <?php } }
       
    ?>
</div>