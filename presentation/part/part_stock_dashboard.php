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
$A1="A-1_0_0";
$A2="A-2_0_0";
$A3="A-3_0_0";
$A4="A-4_0_0";
$A5="A-5_0_0";
$B1="B-1_0_0";
$B2="B-2_0_0";
$B3="B-3_0_0";
$B4="B-4_0_0";
$B5="B-5_0_0";
$C1="C-1_0_0";
$C2="C-2_0_0";
$C3="C-3_0_0";
$C4="C-4_0_0";
$C5="C-5_0_0";
$D1="D-1_0_0";
$D2="D-2_0_0";
$D3="D-3_0_0";
$D4="D-4_0_0";
$D5="D-5_0_0";
$E1="E-1_0_0";
$E2="E-2_0_0";
$E3="E-3_0_0";
$E4="E-4_0_0";
$E5="E-5_0_0";
$F1="F-1_0_0";
$F2="F-2_0_0";
$F3="F-3_0_0";
$F4="F-4_0_0";
$F5="F-5_0_0";
$G1="G-1_0_0";
$G2="G-2_0_0";
$G3="G-3_0_0";
$G4="G-4_0_0";
$G5="G-5_0_0";
$H1="H-1_0_0";
$H2="H-2_0_0";
$H3="H-3_0_0";
$H4="H-4_0_0";
$H5="H-5_0_0";
$I1="I-1_0_0";
$I2="I-2_0_0";
$I3="I-3_0_0";
$I4="I-4_0_0";
$I5="I-5_0_0";
$J1="J-1_0_0";
$J2="J-2_0_0";
$J3="J-3_0_0";
$J4="J-4_0_0";
$J5="J-5_0_0";
$K1="K-1_0_0";
$K2="K-2_0_0";
$K3="K-3_0_0";
$K4="K-4_0_0";
$K5="K-5_0_0";
$L1="L-1_0_0";
$L2="L-2_0_0";
$L3="L-3_0_0";
$L4="L-4_0_0";
$L5="L-5_0_0";
$M1="M-1_0_0";
$M2="M-2_0_0";
$M3="M-3_0_0";
$M4="M-4_0_0";
$M5="M-5_0_0";
$N1="N-1_0_0";
$N2="N-2_0_0";
$N3="N-3_0_0";
$N4="N-4_0_0";
$N5="N-5_0_0";
$O1="O-1_0_0";
$O2="O-2_0_0";
$O3="O-3_0_0";
$O4="O-4_0_0";
$O5="O-5_0_0";
$P1="P-1_0_0";
$P2="P-2_0_0";
$P3="P-3_0_0";
$P4="P-4_0_0";
$P5="P-5_0_0";
$Q1="Q-1_0_0";
$Q2="Q-2_0_0";
$Q3="Q-3_0_0";
$Q4="Q-4_0_0";
$Q5="Q-5_0_0";
$R1="R-1_0_0";
$R2="R-2_0_0";
$R3="R-3_0_0";
$R4="R-4_0_0";
$R5="R-5_0_0";
$S1="S-1_0_0";
$S2="S-2_0_0";
$S3="S-3_0_0";
$S4="S-4_0_0";
$S5="S-5_0_0";
$T1="T-1_0_0";
$T2="T-2_0_0";
$T3="T-3_0_0";
$T4="T-4_0_0";
$T5="T-5_0_0";

$values = array(
   $A1 => [1, 20],
   $A2 => [2, 20],
   $A3 => [3, 20],
   $A4 => [4, 20],
   $A5 => [5, 20],
   $B1 => [1, 19],
   $B2 => [2, 19],
   $B3 => [3, 19],
   $B4 => [4, 19],
   $B5 => [5, 19],
   $C1 => [1, 18],
   $C2 => [2, 18],
   $C3 => [3, 18],
   $C4 => [4, 18],
   $C5 => [5, 18],
   $D1 => [1, 17],
   $D2 => [2, 17],
   $D3 => [3, 17],
   $D4 => [4, 17],
   $D5 => [5, 17],
   $E1 => [1, 16],
   $E2 => [2, 16],
   $E3 => [3, 16],
   $E4 => [4, 16],
   $E5 => [5, 16],
   $F1 => [1, 15],
   $F2 => [2, 15],
   $F3 => [3, 15],
   $F4 => [4, 15],
   $F5 => [5, 15],
   $G1 => [1, 14],
   $G2 => [2, 14],
   $G3 => [3, 14],
   $G4 => [4, 14],
   $G5 => [5, 14],
   $H1 => [1, 13],
   $H2 => [2, 13],
   $H3 => [3, 13],
   $H4 => [4, 13],
   $H5 => [5, 13],
   $I1 => [1, 12],
   $I2 => [2, 12],
   $I3 => [3, 12],
   $I4 => [4, 12],
   $I5 => [5, 12],
   $J1 => [1, 11],
   $J2 => [2, 11],
   $J3 => [3, 11],
   $J4 => [4, 11],
   $J5 => [5, 11],
   $K1 => [1, 10],
   $K2 => [2, 10],
   $K3 => [3, 10],
   $K4 => [4, 10],
   $K5 => [5, 10],
   $L1 => [1, 9],
   $L2 => [2, 9],
   $L3 => [3, 9],
   $L4 => [4, 9],
   $L5 => [5, 9],
   $M1 => [1, 8],
   $M2 => [2, 8],
   $M3 => [3, 8],
   $M4 => [4, 8],
   $M5 => [5, 8],
   $N1 => [1, 8],
   $N2 => [2, 7],
   $N3 => [3, 7],
   $N4 => [4, 7],
   $N5 => [5, 7],
   $O1 => [1, 6],
   $O2 => [2, 6],
   $O3 => [3, 6],
   $O4 => [4, 6],
   $O5 => [5, 6],
   $P1 => [1, 5],
   $P2 => [2, 5],
   $P3 => [3, 5],
   $P4 => [4, 5],
   $P5 => [5, 5],
   $Q1 => [1, 4],
   $Q2 => [2, 4],
   $Q3 => [3, 4],
   $Q4 => [4, 4],
   $Q5 => [5, 4],
   $R1 => [1, 3],
   $R2 => [2, 3],
   $R3 => [3, 3],
   $R4 => [4, 3],
   $R5 => [5, 3],
   $S1 => [1, 2],
   $S2 => [2, 2],
   $S3 => [3, 2],
   $S4 => [4, 2],
   $S5 => [5, 2],
   $T1 => [1, 1],
   $T2 => [2, 1],
   $T3 => [3, 1],
   $T4 => [4, 1],
   $T5 => [5, 1],
);
$query = "SELECT slot_name,part_name,part_model FROM part_stock WHERE rack_number = 'RACK-B'";
$result_set = mysqli_query($connection, $query);
foreach($result_set as $a){
   $slot_name = $a['slot_name'];
   $slot_name_change = $a['slot_name']."_0_0";
   $part_name= $a['part_name'];
   $part_model= $a['part_model'];
   foreach($values as $k => $v){
    
       if($k == $slot_name_change){
           $name= $slot_name."_".$part_name."_".$part_model;
           $values[$name] = $values[$k];
           unset($values[$k]);
       }
   }
}
$grid = createGrid(5, 20);
$grid = plotGridValues($grid, $values);
echo renderGrid($grid);
function createGrid($columns, $rows)
{
   $grid = [];
   $cell = 1;
   for ($r = 0; $r < $rows; $r++) {
       $row = [];
       for ($c = 0; $c < $columns; $c++) {
           $row[] = $cell++;
       }
       $grid[] = $row;
   }
   return $grid;
}
function plotGridValues($grid, $values)
{
   foreach ($values as $value => $coordinates) {
       list($x, $y) = $coordinates;
       $grid[$y - 1][$x - 1] = $value;
   }
   return $grid;
}
function renderGrid($grid) 
{
   $grid = array_reverse($grid);
   ?>
<div class="container-fluid">
    <div class="row mx-3">
        <div class="col-4 mt-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Rack 01</h4>
                </div>
                <div class="card-body mx-auto justify-content-center">
                    <?php  foreach ($grid as $row) { 
                        foreach ($row as $cell) {
                            
                             ?>

                    <a class="btn  bg-white" style="padding = 0px 2px 18px 44px">
                        <i class="fas fa-inbox"></i>
                        <?php 
                        $substring = explode("_", "$cell");
                        forEach($substring as $line){
                            echo $line."</br>";
                        }
                         ?>
                    </a>
                    <?php } }  ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}           
?>
<?php    include_once('../includes/footer.php'); ?>