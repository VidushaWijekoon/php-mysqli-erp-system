<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');
include_once('../../dataAccess/403.php');

$role_id = $_SESSION['role_id']; //4
$department = $_SESSION['department']; //20


 
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];


$A1="A-1_0_0_0";
$A2="A-2_0_0_0";
$A3="A-3_0_0_0";
$A4="A-4_0_0_0";
$A5="A-5_0_0_0";
$B1="B-1_0_0_0";
$B2="B-2_0_0_0";
$B3="B-3_0_0_0";
$B4="B-4_0_0_0";
$B5="B-5_0_0_0";
$C1="C-1_0_0_0";
$C2="C-2_0_0_0";
$C3="C-3_0_0_0";
$C4="C-4_0_0_0";
$C5="C-5_0_0_0";
$D1="D-1_0_0_0";
$D2="D-2_0_0_0";
$D3="D-3_0_0_0";
$D4="D-4_0_0_0";
$D5="D-5_0_0_0";
$E1="E-1_0_0_0";
$E2="E-2_0_0_0";
$E3="E-3_0_0_0";
$E4="E-4_0_0_0";
$E5="E-5_0_0_0";
$F1="F-1_0_0_0";
$F2="F-2_0_0_0";
$F3="F-3_0_0_0";
$F4="F-4_0_0_0";
$F5="F-5_0_0_0";
$G1="G-1_0_0_0";
$G2="G-2_0_0_0";
$G3="G-3_0_0_0";
$G4="G-4_0_0_0";
$G5="G-5_0_0_0";
$H1="H-1_0_0_0";
$H2="H-2_0_0_0";
$H3="H-3_0_0_0";
$H4="H-4_0_0_0";
$H5="H-5_0_0_0";
$I1="I-1_0_0_0";
$I2="I-2_0_0_0";
$I3="I-3_0_0_0";
$I4="I-4_0_0_0";
$I5="I-5_0_0_0";
$J1="J-1_0_0_0";
$J2="J-2_0_0_0";
$J3="J-3_0_0_0";
$J4="J-4_0_0_0";
$J5="J-5_0_0_0";
$K1="K-1_0_0_0";
$K2="K-2_0_0_0";
$K3="K-3_0_0_0";
$K4="K-4_0_0_0";
$K5="K-5_0_0_0";
$L1="L-1_0_0_0";
$L2="L-2_0_0_0";
$L3="L-3_0_0_0";
$L4="L-4_0_0_0";
$L5="L-5_0_0_0";
$M1="M-1_0_0_0";
$M2="M-2_0_0_0";
$M3="M-3_0_0_0";
$M4="M-4_0_0_0";
$M5="M-5_0_0_0";
$N1="N-1_0_0_0";
$N2="N-2_0_0_0";
$N3="N-3_0_0_0";
$N4="N-4_0_0_0";
$N5="N-5_0_0_0";
$O1="O-1_0_0_0";
$O2="O-2_0_0_0";
$O3="O-3_0_0_0";
$O4="O-4_0_0_0";
$O5="O-5_0_0_0";
$P1="P-1_0_0_0";
$P2="P-2_0_0_0";
$P3="P-3_0_0_0";
$P4="P-4_0_0_0";
$P5="P-5_0_0_0";
$Q1="Q-1_0_0_0";
$Q2="Q-2_0_0_0";
$Q3="Q-3_0_0_0";
$Q4="Q-4_0_0_0";
$Q5="Q-5_0_0_0";
$R1="R-1_0_0_0";
$R2="R-2_0_0_0";
$R3="R-3_0_0_0";
$R4="R-4_0_0_0";
$R5="R-5_0_0_0";
$S1="S-1_0_0_0";
$S2="S-2_0_0_0";
$S3="S-3_0_0_0";
$S4="S-4_0_0_0";
$S5="S-5_0_0_0";
$T1="T-1_0_0_0";
$T2="T-2_0_0_0";
$T3="T-3_0_0_0";
$T4="T-4_0_0_0";
$T5="T-5_0_0_0";
$U1="U-1_0_0_0";
$V1="V-1_0_0_0";
$W1="W-1_0_0_0";
$X1="X-1_0_0_0";
$Y1="Y-1_0_0_0";

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
   $N1 => [1, 7],
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
$values1 = array(
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
    $N1 => [1, 7],
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
 $values2 = array(
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
    $N1 => [1, 7],
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
    $values3 = array(
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
        $N1 => [1, 7],
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
        $values4 = array(
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
            $N1 => [1, 7],
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
            
$values_single = array(
    $A1 => [1, 25],
    $B1 => [1, 24],
    $C1 => [1, 23],
    $D1 => [1, 22],
    $E1 => [1, 21],
    $F1 => [1, 20],
    $G1 => [1, 19],
    $H1 => [1, 18],
    $I1 => [1, 17],
    $J1 => [1, 16],
    $K1 => [1, 15],
    $L1 => [1, 14],
    $M1 => [1, 13],
    $N1 => [1, 12],
    $O1 => [1, 11],
    $P1 => [1, 10],
    $Q1 => [1, 9],
    $R1 => [1, 8],
    $S1 => [1, 7],
    $T1 => [1, 6],
    $U1 => [1, 5],
    $V1 => [1, 4],
    $W1 => [1, 3],
    $X1 => [1, 2],
    $Y1 => [1, 1]
 );
 $values_single2 = array(
    $A1 => [1, 25],
    $B1 => [1, 24],
    $C1 => [1, 23],
    $D1 => [1, 22],
    $E1 => [1, 21],
    $F1 => [1, 20],
    $G1 => [1, 19],
    $H1 => [1, 18],
    $I1 => [1, 17],
    $J1 => [1, 16],
    $K1 => [1, 15],
    $L1 => [1, 14],
    $M1 => [1, 13],
    $N1 => [1, 12],
    $O1 => [1, 11],
    $P1 => [1, 10],
    $Q1 => [1, 9],
    $R1 => [1, 8],
    $S1 => [1, 7],
    $T1 => [1, 6],
    $U1 => [1, 5],
    $V1 => [1, 4],
    $W1 => [1, 3],
    $X1 => [1, 2],
    $Y1 => [1, 1]
 );
?>

<div class="container-fluid">
    <div class="row">

        <!-- /////////////////////////// -->
        <!-- <div class="col col-md-4 col-lg-4">
            <fieldset class="mt-4 mb-2 mx-4">
                <legend>Add Item / Remove Item</legend>
                <form name="form" action="#" method="POST">
                    <div class="col-sm-8">
                        <input type="text" id="search" name="search" required value="<?php if (isset($_POST['search'])) {
                                                                                        echo $_POST['search'];
                                                                                    } ?>" placeholder="Search QR">
                    </div>
                </form>
                <script>
                let searchbar = document.querySelector('input[name="search"]');
                searchbar.focus();
                search.value = '';
                </script>
                <?php
                // if (isset($_POST['search'])) {
                //     $location = mysqli_real_escape_string($connection, $_POST['search']);
                //     header("Location: ./add_additional_part.php?scan_id=$location");
                // }
                ?>
            </fieldset>
        </div> -->

        <div class="mt-5 ">
            <?php 
                $part_model =0;
                $part_name =0;
                $slot_name_search = null;
                $search_qty =0;
                $slot_name_search_B = null;
                $search_qty_B =0;
                $slot_name_search_C = null;
                $search_qty_C =0;
                $slot_name_search_d = null;
                $search_qty_d =0;
                $slot_name_search_e = null;
                $search_qty_e =0;
                $slot_name_search_f = null;
                $search_qty_f =0;
                $slot_name_search_g = null;
                $search_qty_g =0;
                $rack_number_a = 'RACK-1';
                $rack_number_b = 'RACK-2';
                $rack_number_c = 'rack-3';
                $rack_number_d = 'rack-4';
                $rack_number_e = 'rack-5';
                $rack_number_f = 'rack-6';
                $rack_number_g = 'rack-7';
                $common_slot = null;
                $test = null;
                $test_b = null;
                $test_c = null;
                $test_d = null;
                $test_e = null;
                $test_f = null;
                $test_g = null;
                $run =null;
                $i =0;
                $item_name;
                $model;
                
                if (isset($_POST['submit'])) {
                    
                    $item_name = mysqli_real_escape_string($connection, $_POST['part_name']);
                    $model = mysqli_real_escape_string($connection, $_POST['model']);
                    $common_slot =  $item_name;                       
                            
                    $query = "SELECT * FROM part_stock WHERE  part_model = '{$model}' AND part_name ='{$item_name}' ";                           
                    $result_set = mysqli_query($connection, $query);


                    $i =0;
                    foreach($result_set as $data){                                                
                        $part_model = $data['part_model'];
                        $part_name = $data['part_name'];

                        if($data['rack_number'] == $rack_number_a){                                                   
                            $slot_name_search = $data['slot_name'];
                            $search_qty =$data['qty'];
                            $test[$i] =array($data['slot_name']);
                            $i++;
                        }
                        elseif($data['rack_number'] == $rack_number_b){
                                $slot_name_search_B = $data['slot_name'];
                                $search_qty_B =$data['qty'];
                                $test_b[$i] =array($data['slot_name']);
                                $i++;
                               
                            }
                            elseif($data['rack_number'] == $rack_number_c){
                                $slot_name_search_C = $data['slot_name'];
                                $search_qty_C =$data['qty'];
                                $test_c[$i] =array($data['slot_name']);
                                $i++;
                                echo "im here";
                            } elseif($data['rack_number'] == $rack_number_d){
                                 $slot_name_search_d = $data['slot_name'];
                                 $search_qty_d =$data['qty'];
                                 $test_d[$i] =array($data['slot_name']);
                                 $i++;
                            } elseif($data['rack_number'] == $rack_number_e){
                                $slot_name_search_e = $data['slot_name'];
                                $search_qty_e =$data['qty'];
                                $test_e[$i] =array($data['slot_name']);
                                $i++;
                            }elseif($data['rack_number'] == $rack_number_f){
                                $slot_name_search_f = $data['slot_name'];
                                $search_qty_f =$data['qty'];
                                $test_f[$i] =array($data['slot_name']);
                                $i++;
                           } elseif($data['rack_number'] == $rack_number_g){
                               $slot_name_search_g = $data['slot_name'];
                               $search_qty_g =$data['qty'];
                               $test_g[$i] =array($data['slot_name']);
                               $i++;
                           }
                        }
                                             
                    }
                ?>
        </div>

        <div class="col col-md-8 col-sm-8 col-lg-6">
            <fieldset class="mt-4 mb-2 mx-4">
                <legend>Find Me !!</legend>
                <form name="form" action="#" method="POST">
                    <div class="col-sm-8">
                        <select name="part_name" class="info_select w-25 mx-1" style="border-radius: 5px;">
                            <option selected>--Select Item--</option>
                            <?php
                                $query = "SELECT * FROM part_list";
                                $result = mysqli_query($connection, $query);

                                while ($selection = mysqli_fetch_array($result, MYSQLI_ASSOC)) :; ?>

                            <option value="<?php echo $selection["part_name"]; ?>">
                                <?php echo strtoupper($selection["part_name"]); ?>
                            </option>
                            <?php endwhile; ?>
                        </select>
                        <input type="search" class="w-25" name="model" id="model">
                        <button type="submit" name="submit" class="btn btn-primary btn-xs mx-2"><i
                                class="fa-solid fa-search" style="margin-right: 5px;"></i>Search</button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>
<div class="row">
    <div class="col col-md-8 col-sm-8 col-lg-6 mx-5">
        <?php  echo "<span class='badge badge-lg badge-primary text-white p-2 mb-2 mt-1 px-5 text-uppercase'>$common_slot</span>";
                
        if(empty($test)){}else{ ?>
        <div class=''>Rack-01 --></div>
        <?php  foreach($test as $test1){ ?>
        <?php if($role_id == 4 && $department ==20){ ?>
        <a class="btn  bg-danger mt-2" href="add_additional_part.php?scan_id=<?php echo "rack-1_".$test1[0] ?>">
            <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                <?php  echo $test1[0]; ?>
            </a>
            <?php } } 
        
        if(empty($test_b)){}else{ ?>
            <div>Rack-02 --></div>
            <?php    foreach($test_b as $test1){ ?>
            <?php if($role_id == 4 && $department ==20){ ?>
            <a class="btn  bg-danger mt-2" href="
            add_additional_part.php?scan_id=<?php echo "rack-2_".$test1[0] ?>">
                <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                    <?php  echo $test1[0]; ?>
                </a> <?php } } 
        
        if(empty($test_c)){}else{ ?>
                <div>Rack-03 --></div>
                <?php  foreach($test_c as $test1){ ?>
                <?php if($role_id == 4 && $department ==20){ ?>
                <a class="btn  bg-danger mt-2" href="
            add_additional_part.php?scan_id=<?php echo "rack-3_".$test1[0] ?>">
                    <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                        <?php  echo $test1[0]; ?>
                    </a>
                    <?php } }  
        
        if(empty($test_d)){}else{ ?>
                    <div class=''>Rack-04 --></div>
                    <?php  foreach($test_d as $test1){ ?>
                    <?php if($role_id == 4 && $department ==20){ ?>
                    <a class="btn  bg-danger mt-2"
                        href="add_additional_part.php?scan_id=<?php echo "rack-4_".$test1[0] ?>">
                        <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                            <?php  echo $test1[0]; ?>
                        </a>
                        <?php } } ?>

                        <?php if(empty($test_e)){}else{ ?>
                        <div class=''>Rack-05 --></div>
                        <?php  foreach($test_e as $test1){ ?>
                        <?php if($role_id == 4 && $department ==20){ ?>
                        <a class="btn  bg-danger mt-2"
                            href="add_additional_part.php?scan_id=<?php echo "rack-5_".$test1[0] ?>">
                            <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                                <?php  echo $test1[0]; ?>
                            </a>
                            <?php } } ?>
                            <?php if(empty($test_f)){}else{ ?>
                            <div class=''>Rack-06 --></div>
                            <?php  foreach($test_f as $test1){ ?>
                            <?php if($role_id == 4 && $department ==20){ ?>
                            <a class="btn  bg-danger mt-2"
                                href="add_additional_part.php?scan_id=<?php echo "rack-6_".$test1[0] ?>">
                                <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                                    <?php  echo $test1[0]; ?>
                                </a>
                                <?php } } ?>
                                <?php if(empty($test_g)){}else{ ?>
                                <div class=''>Rack-07 --></div>
                                <?php  foreach($test_g as $test1){ ?>
                                <?php if($role_id == 4 && $department ==20){ ?>
                                <a class="btn  bg-danger mt-2"
                                    href="add_additional_part.php?scan_id=<?php echo "rack-7_".$test1[0] ?>">
                                    <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                                        <?php  echo $test1[0]; ?>
                                    </a>
                                    <?php } } ?>
    </div>
</div>
<div class="container-fluid">
    <div class="row mx-3">
        <!-- // rack 01 -->
        <div class="col-lg-4 col-md-6 col-sm-10 mt-5 text-uppercase">
            <?php  
                $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'RACK-1'";
                $result_set = mysqli_query($connection, $query);
                foreach($result_set as $a){
                    $slot_name = $a['slot_name'];
                    $slot_name_change = $a['slot_name']."_0_0_0";
                    $part_name= $a['part_name'];
                    $part_model= $a['part_model'];
                    $qty= $a['qty'];
                        foreach($values as $k => $v){
                            if($k == $slot_name_change){
                                $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                                $values[$name] = $values[$k];
                                unset($values[$k]);
                            }
                        }
                    }
                        $grid = createGrid(5, 20);
                        $grid = plotGridValues($grid, $values);
                        echo renderGrid($grid ,$slot_name_search,$search_qty,$common_slot,$test,$role_id,$department,$test_b,$test_c,$test_d,$test_e,$test_g,$test_f);
                    function createGrid($columns, $rows){
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
                        function plotGridValues($grid, $values) {
                            foreach ($values as $value => $coordinates) {
                                list($x, $y) = $coordinates;
                                $grid[$y - 1][$x - 1] = $value;
                        }
                        return $grid;
                    }
                        function renderGrid($grid ,$slot_name_search,$search_qty,$common_slot,$test,$role_id,$department,$test_b,$test_c,$test_d,$test_e,$test_g,$test_f){
                        $grid = array_reverse($grid); 
                        $i =0;    
                        if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)) || !empty($test)) {                
               ?>
            <div class="card card-primary">
                <div class="card-header" ;>
                    <h4 class=" card-title">Rack 01</h4>
                </div>
                <div class="card-body text-center">
                    <?php  
                    foreach ($grid as $row) {                         
                        foreach ($row as $k=>$v) { 
                            $substring = explode("_", $v);
                            // empty qty 
                                if($substring[3] == 0){ ?>

                    <!-- // slot name with empty qty -->
                    <?php 
                        if(empty($test)){
                            if($role_id == 4 && $department ==20){ ?>
                    <a class="btn grid_btn bg-secondary mt-2"
                        href="part_create_form.php?scan_id=<?php echo "rack-1_".$substring[0] ?>">
                        <?php }else{ ?>
                        <a class="btn grid_btn bg-secondary mt-2">
                            <?php } ?>

                            <i class="fas fa-inbox"></i>
                            <?php 
                            echo $substring[0]."</br>";
                            echo "</br>";
                            echo "</br>";
                            echo "</br>";
                        }
                        ?>
                        </a>
                        <?php }else{  
                    // <!-- slot with value -->
                    if(empty($test)) { ?>
                        <?php if($role_id == 4 && $department ==20){ ?>
                        <a class="btn grid_btn bg-success mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-1_".$substring[0] ?>">
                            <?php }else{ ?>
                            <a class="btn grid_btn bg-success mt-2">
                                <i class="fas fa-inbox"></i>
                                <?php
                                }
                            echo $substring[0]."</br>";
                            echo $substring[1]."</br>";
                            echo $substring[2]."</br>";
                            echo $substring[3]."</br>";
                         ?>
                            </a>
                            <?php } elseif(!empty($test)) {   
                        foreach($test as $a){
                            if($substring[0] == $a[0]) { ?>
                            <?php if($role_id == 4 && $department ==20){ ?>
                            <a class="btn grid_btn bg-danger mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-1_".$substring[0] ?>">
                                <?php } else { ?>
                                <a class="btn grid_btn bg-danger mt-2">
                                    <?php } ?>
                                    <i class="fas fa-inbox"></i>
                                    <?php
                            echo $substring[0]."</br>";
                            echo $substring[1]."</br>";
                            echo $substring[2]."</br>";
                            echo $substring[3]."</br>";
                        ?>
                                </a>
                                <?php
                        // echo $a[0]."----".$slot_name_search;
                        // echo "</br>";
                    } }  } } } }  ?>
                </div>
            </div>
            <?php }} ?>
        </div>
        <!-- // rack 02 -->

        <?php
            $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'RACK-2'";
            $result_set = mysqli_query($connection, $query);
            foreach($result_set as $a){
            $slot_name = $a['slot_name'];
            $slot_name_change = $a['slot_name']."_0_0_0";
            $part_name= $a['part_name'];
            $part_model= $a['part_model'];
            $qty= $a['qty'];
            foreach($values1 as $k => $v){
                
                if($k == $slot_name_change){
                    $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                    $values1[$name] = $values1[$k];
                    unset($values1[$k]);
                }
            }
            }
            $grid1 = createGrid1(5, 20);
            $grid1 = plotGridValues1($grid1, $values1);
            echo renderGrid1($grid1,$slot_name_search_B,$search_qty_B,$common_slot,$test_b,$role_id,$department,$test,$test_c,$test_d,$test_e,$test_g,$test_f);
            function createGrid1($columns, $rows)
            {
            $grid1 = [];
            $cell = 1;
            for ($r = 0; $r < $rows; $r++) {
                $row = [];
                for ($c = 0; $c < $columns; $c++) {
                    $row[] = $cell++;
                }
                $grid1[] = $row;
            }
            return $grid1;
            }
            function plotGridValues1($grid1, $values1)
            {
            foreach ($values1 as $value => $coordinates) {
                list($x, $y) = $coordinates;
                $grid1[$y - 1][$x - 1] = $value;
            }
            return $grid1;
            }
            function renderGrid1($grid1 ,$slot_name_search_b,$search_qty_b,$common_slot,$test_b,$role_id,$department,$test,$test_c,$test_d,$test_e,$test_g,$test_f)
            {
            $grid1 = array_reverse($grid1); 
            $i =0;
            
       ?>
        <?php if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)) || !empty($test_b)) {?>
        <div class="col-4 mt-5 text-uppercase">
            <div class="card card-primary">
                <div class="card-header" ;>
                    <h4 class=" card-title">Rack 02</h4>


                </div>
                <div class="card-body mx-auto justify-content-center mx-auto text-center">
                    <?php  foreach ($grid1 as $row) { 
                
                foreach ($row as $k=>$v) { 
                    $substring = explode("_", $v);
                    //   empty qty 
                    if($substring[3] == 0){ 
                        ?>
                    <!-- // slot name with empty qty -->

                    <?php 
                     if(empty($test_b)){
                    if($role_id == 4 && $department ==20){ ?>
                    <a class="btn grid_btn bg-secondary mt-2" href="
                            part_create_form.php?scan_id=<?php echo "rack-2_".$substring[0] ?>">
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
                        <?php }}else{ ?>


                        <!-- slot with value -->
                        <?php if(empty($test_b)){?>
                        <?php if($role_id == 4 && $department ==20){ ?>
                        <a class="btn grid_btn bg-success mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-2_".$substring[0] ?>">
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
            foreach($test_b as $a){
               if($substring[0] == $a[0] ){ ?>
                            <?php if($role_id == 4 && $department ==20){ ?>
                            <a class="btn grid_btn bg-danger mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-2_".$substring[0] ?>">
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
            <?php } }?>
        </div>
        <!-- // rack 03 -->

        <?php
            $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'RACK-3'";
            $result_set = mysqli_query($connection, $query);
            foreach($result_set as $a){
            $slot_name = $a['slot_name'];
            $slot_name_change = $a['slot_name']."_0_0_0";
            $part_name= $a['part_name'];
            $part_model= $a['part_model'];
            $qty= $a['qty'];
            foreach($values2 as $k => $v){
                
                if($k == $slot_name_change){
                    $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                    $values2[$name] = $values2[$k];
                    unset($values2[$k]);
                }
            }
            }
            $grid2 = createGrid2(5, 20);
            $grid2 = plotGridValues2($grid2, $values2);
            echo renderGrid2($grid2,$slot_name_search_C,$search_qty_C,$common_slot,$test_c,$role_id,$department,$test, $test_b,$test_d,$test_e,$test_g,$test_f);
            function createGrid2($columns, $rows)
            {
            $grid2 = [];
            $cell = 1;
            for ($r = 0; $r < $rows; $r++) {
                $row = [];
                for ($c = 0; $c < $columns; $c++) {
                    $row[] = $cell++;
                }
                $grid2[] = $row;
            }
            return $grid2;
            }
            function plotGridValues2($grid2, $values2)
            {
            foreach ($values2 as $value => $coordinates) {
                list($x, $y) = $coordinates;
                $grid2[$y - 1][$x - 1] = $value;
            }
            return $grid2;
            }
            function renderGrid2($grid2 ,$slot_name_search_c,$search_qty_c,$common_slot,$test_c,$role_id,$department,$test, $test_b,$test_d,$test_e,$test_g,$test_f)
            {
            $grid2 = array_reverse($grid2); 
            $i =0;
            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)) || !empty($test_c)) {  
            
       ?>
        <div class="col-4 mt-5 text-uppercase">
            <div class="card card-primary">
                <div class="card-header" ;>
                    <h4 class=" card-title">Rack 03</h4>


                </div>
                <div class="card-body mx-auto justify-content-center mx-auto text-center">
                    <?php  foreach ($grid2 as $row) { 
                
                foreach ($row as $k=>$v) { 
                    $substring = explode("_", $v);
                    //   empty qty 
                    if($substring[3] == 0){ ?>
                    <!-- // slot name with empty qty -->
                    <?php 
                    if(empty($test_c)){
                    if($role_id == 4 && $department ==20){ ?>
                    <a class="btn grid_btn bg-secondary mt-2" href="
                            part_create_form.php?scan_id=<?php echo "rack-3_".$substring[0] ?>">
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
                        <?php if($role_id == 4 && $department ==20){ ?>
                        <a class="btn grid_btn bg-success mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-3_".$substring[0] ?>">
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
                            <?php if($role_id == 4 && $department ==20){ ?>
                            <a class="btn grid_btn bg-danger mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-3_".$substring[0] ?>">
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
            <?php } }?>
        </div>
    </div>
</div>
<!-- rack 04 -->
<div class="container-fluid">
    <div class="row mx-3">
        <?php
            $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'rack-4'";
            $result_set = mysqli_query($connection, $query);
            foreach($result_set as $a){
            $slot_name = $a['slot_name'];
            $slot_name_change = $a['slot_name']."_0_0_0";
            $part_name= $a['part_name'];
            $part_model= $a['part_model'];
            $qty= $a['qty'];
            foreach($values3 as $k => $v){
                
                if($k == $slot_name_change){
                    $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                    $values3[$name] = $values3[$k];
                    unset($values3[$k]);
                }
            }
            }
            $grid3 = createGrid3(5, 20);
            $grid3 = plotGridvalues3($grid3, $values3);
            echo renderGrid3($grid3,$slot_name_search_C,$search_qty_C,$common_slot,$test_c,$role_id,$department,$test, $test_b,$test_d,$test_e,$test_g,$test_f);
            function createGrid3($columns, $rows)
            {
            $grid3 = [];
            $cell = 1;
            for ($r = 0; $r < $rows; $r++) {
                $row = [];
                for ($c = 0; $c < $columns; $c++) {
                    $row[] = $cell++;
                }
                $grid3[] = $row;
            }
            return $grid3;
            }
            function plotGridvalues3($grid3, $values3)
            {
            foreach ($values3 as $value => $coordinates) {
                list($x, $y) = $coordinates;
                $grid3[$y - 1][$x - 1] = $value;
            }
            return $grid3;
            }
            function renderGrid3($grid3 ,$slot_name_search_c,$search_qty_c,$common_slot,$test_c,$role_id,$department,$test, $test_b,$test_d,$test_e,$test_g,$test_f)
            {
            $grid3 = array_reverse($grid3); 
            $i =0;
            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)) || !empty($test_d)) {  
            
       ?>
        <div class="col-4 mt-5 text-uppercase">
            <div class="card card-primary">
                <div class="card-header" ;>
                    <h4 class=" card-title">Rack 04</h4>


                </div>
                <div class="card-body mx-auto justify-content-center mx-auto text-center">
                    <?php  foreach ($grid3 as $row) { 
                
                foreach ($row as $k=>$v) { 
                    $substring = explode("_", $v);
                    //   empty qty 
                    if($substring[3] == 0){ ?>
                    <!-- // slot name with empty qty -->
                    <?php 
                    if(empty($test_d)){
                    if($role_id == 4 && $department ==20){ ?>
                    <a class="btn grid_btn bg-secondary mt-2" href="
                            part_create_form.php?scan_id=<?php echo "rack-3_".$substring[0] ?>">
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
                        <?php if(empty($test_d)){?>
                        <?php if($role_id == 4 && $department ==20){ ?>
                        <a class="btn grid_btn bg-success mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-3_".$substring[0] ?>">
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
            foreach($test_d as $a){
               if($substring[0] == $a[0] ){ ?>
                            <?php if($role_id == 4 && $department ==20){ ?>
                            <a class="btn grid_btn bg-danger mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-3_".$substring[0] ?>">
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
            <?php } }?>
        </div>
        <!-- rack 05 -->


        <div class="col-1 mt-5 text-uppercase text-center">
            <?php
            $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'rack-5'";
            $result_set = mysqli_query($connection, $query);
            foreach($result_set as $a){
            $slot_name = $a['slot_name'];
            $slot_name_change = $a['slot_name']."_0_0_0";
            $part_name= $a['part_name'];
            $part_model= $a['part_model'];
            $qty= $a['qty'];
            foreach($values_single as $k => $v){
                
                if($k == $slot_name_change){
                    $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                    $values_single[$name] = $values_single[$k];
                    unset($values_single[$k]);
                }
            }
            }
            $grid4 = createGrid4(1, 25);
            $grid4 = plotGridValues4($grid4, $values_single);
            echo renderGrid4($grid4,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f);
            function createGrid4($columns, $rows)
            {
            $grid4 = [];
            $cell = 1;
            for ($r = 0; $r < $rows; $r++) {
                $row = [];
                for ($c = 0; $c < $columns; $c++) {
                    $row[] = $cell++;
                }
                $grid4[] = $row;
            }
            return $grid4;
            }
            function plotGridValues4($grid4, $values_single)
            {
            foreach ($values_single as $value => $coordinates) {
                list($x, $y) = $coordinates;
                $grid4[$y - 1][$x - 1] = $value;
            }
            return $grid4;
            }
            function renderGrid4($grid4 ,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f)
            {
            $grid4 = array_reverse($grid4); 
            $i =0;
            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)) || !empty($test_e)) {
             
       ?>
            <div class="card card-primary">
                <div class="card-header" ;>
                    <h4 class=" card-title">Rack 05</h4>


                </div>
                <div class="card-body mx-auto justify-content-center mx-auto text-center">
                    <?php  foreach ($grid4 as $row) { 
                
                foreach ($row as $k=>$v) { 
                    $substring = explode("_", $v);
                    //   empty qty 
                    if($substring[3] == 0){ ?>
                    <!-- // slot name with empty qty -->
                    <?php if($role_id == 4 && $department ==20){ ?>
                    <a class="btn grid_btn bg-secondary mt-2" href="
                            part_create_form.php?scan_id=<?php echo "rack-5_".$substring[0] ?>">
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
                        <?php if(empty($test_e)){?>
                        <?php if($role_id == 4 && $department ==20){ ?>
                        <a class="btn grid_btn bg-success mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-5_".$substring[0] ?>">
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
            foreach($test_e as $a){
               if($substring[0] == $a[0] ){ ?>
                            <?php if($role_id == 4 && $department ==20){ ?>
                            <a class="btn grid_btn bg-danger mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-5_".$substring[0] ?>">
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

        <!-- rack-06 -->

        <?php
            $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'rack-6'";
            $result_set = mysqli_query($connection, $query);
            echo "hi im there";
            foreach($result_set as $a){
            $slot_name = $a['slot_name'];
            $slot_name_change = $a['slot_name']."_0_0_0";
            $part_name= $a['part_name'];
            $part_model= $a['part_model'];
            $qty= $a['qty'];
            foreach($values_single2 as $k => $v){
                
                if($k == $slot_name_change){
                    $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                    $values_single2[$name] = $values_single2[$k];
                    unset($values_single2[$k]);
                }
            }
            }
            $grid5 = createGrid5(1, 25);
            $grid5 = plotGridValues5($grid5, $values_single2);
            echo renderGrid5($grid5,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f);
            function createGrid5($columns, $rows)
            {
            $grid5 = [];
            $cell = 1;
            for ($r = 0; $r < $rows; $r++) {
                $row = [];
                for ($c = 0; $c < $columns; $c++) {
                    $row[] = $cell++;
                }
                $grid5[] = $row;
            }
            return $grid5;
            }
            function plotGridValues5($grid5, $values_single2)
            {
            foreach ($values_single2 as $value => $coordinates) {
                list($x, $y) = $coordinates;
                $grid5[$y - 1][$x - 1] = $value;
            }
            return $grid5;
            }
            function renderGrid5($grid5 ,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_f,$test_g)
            {
            $grid5 = array_reverse($grid5); 
            $i =0;
           
            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)) || !empty($test_f)) {
              
       ?>
        <div class="col-1 mt-5 text-uppercase text-center">
            <div class="card card-primary">
                <div class="card-header" ;>
                    <h4 class=" card-title">Rack 06</h4>


                </div>
                <div class="card-body mx-auto justify-content-center mx-auto text-center">
                    <?php  foreach ($grid5 as $row) { 
                
                foreach ($row as $k=>$v) { 
                    $substring = explode("_", $v);
                    //   empty qty 
                    if($substring[3] == 0){ ?>
                    <!-- // slot name with empty qty -->
                    <?php if($role_id == 4 && $department ==20){ ?>
                    <a class="btn grid_btn bg-secondary mt-2" href="
                            part_create_form.php?scan_id=<?php echo "rack-6_".$substring[0] ?>">
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
                        <?php if(empty($test_f)){?>
                        <?php if($role_id == 4 && $department ==20){ ?>
                        <a class="btn grid_btn bg-success mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-6_".$substring[0] ?>">
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
            foreach($test_f as $a){
               if($substring[0] == $a[0] ){ ?>
                            <?php if($role_id == 4 && $department ==20){ ?>
                            <a class="btn grid_btn bg-danger mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-6_".$substring[0] ?>">
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

    </div>
</div>

<script>
let searchbar = document.querySelector('input[name="model"]');
searchbar.focus();
search.value = '';
</script>

<?php include_once('../includes/footer.php');  ?>