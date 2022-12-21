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
            $values5 = array(
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
                $values6 = array(
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
 $values_single3 = array(
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
 $values_single4 = array(
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
 $values_single5 = array(
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
 $values_single6 = array(
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
 $values_single7 = array(
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
 $values_single8 = array(
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
 $values_single9 = array(
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
 $values_single10 = array(
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
 $values_single11 = array(
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
 $values_single12 = array(
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
                $slot_name_search_h = null;
                $search_qty_h =0;
                $slot_name_search_i = null;
                $search_qty_i =0;
                $slot_name_search_j = null;
                $search_qty_j =0;
                $slot_name_search_k = null;
                $search_qty_k =0;
                $slot_name_search_l = null;
                $search_qty_l =0;
                $slot_name_search_m = null;
                $search_qty_m =0;
                $slot_name_search_n = null;
                $search_qty_n =0;
                $slot_name_search_o = null;
                $search_qty_o =0;
                $slot_name_search_p = null;
                $search_qty_p =0;
                $slot_name_search_q = null;
                $search_qty_q =0;
                $rack_number_a = 'RACK-1';
                $rack_number_b = 'RACK-2';
                $rack_number_c = 'rack-3';
                $rack_number_d = 'rack-4';
                $rack_number_e = 'rack-17';
                $rack_number_f = 'rack-5';
                $rack_number_g = 'rack-6';
                $rack_number_h = 'rack-7';
                $rack_number_i = 'rack-8';
                $rack_number_j = 'rack-9';
                $rack_number_k = 'rack-10';
                $rack_number_l = 'rack-11';
                $rack_number_m = 'rack-12';
                $rack_number_n = 'rack-13';
                $rack_number_o = 'rack-14';
                $rack_number_p = 'rack-15';
                $rack_number_q = 'rack-16';
                $common_slot = null;
                $test = null;
                $test_b = null;
                $test_c = null;
                $test_d = null;
                $test_e = null;
                $test_f = null;
                $test_g = null;
                $test_h = null;
                $test_i = null;
                $test_j = null;
                $test_k = null;
                $test_l = null;
                $test_m = null;
                $test_n = null;
                $test_o = null;
                $test_p = null;
                $test_q = null;
                $single_rack_1 = 0;
                $single_rack_2 = 0;
                $single_rack_3 = 0;
                $single_rack_4 = 0;
                $single_rack_5 = 0;
                $single_rack_6 = 0;
                $single_rack_7 = 0;
                $single_rack_8 = 0;
                $single_rack_9 = 0;
                $single_rack_10 = 0;
                $single_rack_11 = 0;
                $single_rack_12 = 0;
                $single_rack_13 = 0;
                $run =null;
                $i =0;
                $item_name;
                $model= null;
                
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
                            } elseif($data['rack_number'] == $rack_number_d){
                                 $slot_name_search_d = $data['slot_name'];
                                 $search_qty_d =$data['qty'];
                                 $test_d[$i] =array($data['slot_name']);
                                 $i++;
                            } elseif($data['rack_number'] == $rack_number_f){
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
                           elseif($data['rack_number'] == $rack_number_h){
                            $slot_name_search_h = $data['slot_name'];
                            $search_qty_h =$data['qty'];
                            $test_h[$i] =array($data['slot_name']);
                            $i++;
                        }elseif($data['rack_number'] == $rack_number_i){
                            $slot_name_search_i = $data['slot_name'];
                            $search_qty_i =$data['qty'];
                            $test_i[$i] =array($data['slot_name']);
                            $i++;
                        }
                        elseif($data['rack_number'] == $rack_number_j){
                            $slot_name_search_j = $data['slot_name'];
                            $search_qty_j =$data['qty'];
                            $test_j[$i] =array($data['slot_name']);
                            $i++;
                        }elseif($data['rack_number'] == $rack_number_k){
                            $slot_name_search_k = $data['slot_name'];
                            $search_qty_k =$data['qty'];
                            $test_k[$i] =array($data['slot_name']);
                            $i++;
                        }elseif($data['rack_number'] == $rack_number_l){
                            $slot_name_search_l = $data['slot_name'];
                            $search_qty_l =$data['qty'];
                            $test_l[$i] =array($data['slot_name']);
                            $i++;
                       } elseif($data['rack_number'] == $rack_number_m){
                           $slot_name_search_m = $data['slot_name'];
                           $search_qty_m =$data['qty'];
                           $test_m[$i] =array($data['slot_name']);
                           $i++;
                       }
                       elseif($data['rack_number'] == $rack_number_n){
                        $slot_name_search_n = $data['slot_name'];
                        $search_qty_n =$data['qty'];
                        $test_n[$i] =array($data['slot_name']);
                        $i++;
                    }elseif($data['rack_number'] == $rack_number_o){
                        $slot_name_search_o = $data['slot_name'];
                        $search_qty_o =$data['qty'];
                        $test_o[$i] =array($data['slot_name']);
                        $i++;
                    }
                    elseif($data['rack_number'] == $rack_number_p){
                        $slot_name_search_p = $data['slot_name'];
                        $search_qty_p =$data['qty'];
                        $test_p[$i] =array($data['slot_name']);
                        $i++;
                    }elseif($data['rack_number'] == $rack_number_q){
                        $slot_name_search_q = $data['slot_name'];
                        $search_qty_q =$data['qty'];
                        $test_q[$i] =array($data['slot_name']);
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
          echo "<span class='badge badge-lg badge-primary text-white p-2 mb-2 mt-1 px-5 text-uppercase'>$model</span>";
                
        if(empty($test)){}else{ ?>
        <div class='mt-2'>Rack-01 --></div>
        <?php  foreach($test as $test1){ ?>
        <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
        <a class="btn  bg-danger mt-2" href="add_additional_part.php?scan_id=<?php echo "rack-1_".$test1[0] ?>">
            <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                <?php  echo $test1[0]; ?>
            </a>
            <?php } } 
        
        if(empty($test_b)){}else{ ?>
            <div class='mt-2'>Rack-02 --></div>
            <?php    foreach($test_b as $test1){ ?>
            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
            <a class="btn  bg-danger mt-2" href="
            add_additional_part.php?scan_id=<?php echo "rack-2_".$test1[0] ?>">
                <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                    <?php  echo $test1[0]; ?>
                </a> <?php } } 
        
        if(empty($test_c)){}else{ ?>
                <div class='mt-2'>Rack-03 --></div>
                <?php  foreach($test_c as $test1){ ?>
                <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                <a class="btn  bg-danger mt-2" href="
            add_additional_part.php?scan_id=<?php echo "rack-3_".$test1[0] ?>">
                    <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                        <?php  echo $test1[0]; ?>
                    </a>
                    <?php } }  
        
        if(empty($test_d)){}else{ ?>
                    <div class='mt-2'>Rack-04 --></div>
                    <?php  foreach($test_d as $test1){ ?>
                    <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                    <a class="btn  bg-danger mt-2"
                        href="add_additional_part.php?scan_id=<?php echo "rack-4_".$test1[0] ?>">
                        <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                            <?php  echo $test1[0]; ?>
                        </a>
                        <?php } } ?>

                        <?php if(empty($test_f)){}else{ $single_rack_1 =1;?>
                        <div class='mt-2'>Rack-05 --></div>
                        <?php  foreach($test_f as $test1){ ?>
                        <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                        <a class="btn  bg-danger mt-2"
                            href="add_additional_part.php?scan_id=<?php echo "rack-5_".$test1[0] ?>">
                            <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                                <?php  echo $test1[0]; ?>
                            </a>
                            <?php } } ?>
                            <?php if(empty($test_g)){}else{ $single_rack_2 =1; ?>
                            <div class='mt-2'>Rack-06 --></div>
                            <?php  foreach($test_g as $test1){ ?>
                            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                            <a class="btn  bg-danger mt-2"
                                href="add_additional_part.php?scan_id=<?php echo "rack-6_".$test1[0] ?>">
                                <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                                    <?php  echo $test1[0]; ?>
                                </a>
                                <?php } } ?>

                                <?php if(empty($test_h)){}else{ $single_rack_3 =1; ?>
                                <div class='mt-2'>Rack-07 --></div>
                                <?php  foreach($test_h as $test1){ ?>
                                <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                <a class="btn  bg-danger mt-2"
                                    href="add_additional_part.php?scan_id=<?php echo "rack-7_".$test1[0] ?>">
                                    <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                                        <?php  echo $test1[0]; ?>
                                    </a>
                                    <?php } } ?>
                                    <?php if(empty($test_i)){}else{ $single_rack_4 =1; ?>
                                    <div class='mt-2'>Rack-08 --></div>
                                    <?php  foreach($test_i as $test1){ ?>
                                    <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                    <a class="btn  bg-danger mt-2"
                                        href="add_additional_part.php?scan_id=<?php echo "rack-8_".$test1[0] ?>">
                                        <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                                            <?php  echo $test1[0]; ?>
                                        </a>
                                        <?php } } ?>

                                        <?php if(empty($test_j)){}else{  $single_rack_5 =1;?>
                                        <div class='mt-2'>Rack-09 --></div>
                                        <?php  foreach($test_j as $test1){ ?>
                                        <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                        <a class="btn  bg-danger mt-2"
                                            href="add_additional_part.php?scan_id=<?php echo "rack-9_".$test1[0] ?>">
                                            <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                                                <?php  echo $test1[0]; ?>
                                            </a>
                                            <?php } } ?>

                                            <?php if(empty($test_k)){}else{  $single_rack_6 =1;?>
                                            <div class='mt-2'>Rack-10 --></div>
                                            <?php  foreach($test_k as $test1){ ?>
                                            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                            <a class="btn  bg-danger mt-2"
                                                href="add_additional_part.php?scan_id=<?php echo "rack-10_".$test1[0] ?>">
                                                <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                                                    <?php  echo $test1[0]; ?>
                                                </a>
                                                <?php } } ?>

                                                <?php if(empty($test_l)){}else{  $single_rack_7 =1;?>
                                                <div class='mt-2'>Rack-11 --></div>
                                                <?php  foreach($test_l as $test1){ ?>
                                                <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                                <a class="btn  bg-danger mt-2"
                                                    href="add_additional_part.php?scan_id=<?php echo "rack-11_".$test1[0] ?>">
                                                    <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                                                        <?php  echo $test1[0]; ?>
                                                    </a>
                                                    <?php } } ?>

                                                    <?php if(empty($test_m)){}else{  $single_rack_8 =1;?>
                                                    <div class='mt-2'>Rack-12 --></div>
                                                    <?php  foreach($test_m as $test1){ ?>
                                                    <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                                    <a class="btn  bg-danger mt-2"
                                                        href="add_additional_part.php?scan_id=<?php echo "rack-12_".$test1[0] ?>">
                                                        <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                                                            <?php  echo $test1[0]; ?>
                                                        </a>
                                                        <?php } } ?>

                                                        <?php if(empty($test_n)){}else{  $single_rack_9 =1;?>
                                                        <div class='mt-2'>Rack-13 --></div>
                                                        <?php  foreach($test_n as $test1){ ?>
                                                        <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                                        <a class="btn  bg-danger mt-2"
                                                            href="add_additional_part.php?scan_id=<?php echo "rack-13_".$test1[0] ?>">
                                                            <?php } else{ ?> <a class="btn  bg-danger mt-2"> <?php } ?>
                                                                <?php  echo $test1[0]; ?>
                                                            </a>
                                                            <?php } } ?>

                                                            <?php if(empty($test_o)){}else{  $single_rack_10 =1;?>
                                                            <div class='mt-2'>Rack-14 --></div>
                                                            <?php  foreach($test_o as $test1){ ?>
                                                            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                                            <a class="btn  bg-danger mt-2"
                                                                href="add_additional_part.php?scan_id=<?php echo "rack-14_".$test1[0] ?>">
                                                                <?php } else{ ?> <a class="btn  bg-danger mt-2">
                                                                    <?php } ?>
                                                                    <?php  echo $test1[0]; ?>
                                                                </a>
                                                                <?php } } ?>

                                                                <?php if(empty($test_p)){}else{  $single_rack_11 =1;?>
                                                                <div class='mt-2'>Rack-15 --></div>
                                                                <?php  foreach($test_p as $test1){ ?>
                                                                <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                                                <a class="btn  bg-danger mt-2"
                                                                    href="add_additional_part.php?scan_id=<?php echo "rack-15_".$test1[0] ?>">
                                                                    <?php } else{ ?> <a class="btn  bg-danger mt-2">
                                                                        <?php } ?>
                                                                        <?php  echo $test1[0]; ?>
                                                                    </a>
                                                                    <?php } } ?>

                                                                    <?php if(empty($test_q)){}else{  $single_rack_11 =1;?>
                                                                    <div class='mt-2'>Rack-15 --></div>
                                                                    <?php  foreach($test_q as $test1){ ?>
                                                                    <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                                                    <a class="btn  bg-danger mt-2"
                                                                        href="add_additional_part.php?scan_id=<?php echo "rack-15_".$test1[0] ?>">
                                                                        <?php } else{ ?> <a class="btn  bg-danger mt-2">
                                                                            <?php } ?>
                                                                            <?php  echo $test1[0]; ?>
                                                                        </a>
                                                                        <?php } } ?>
                                                                        <?php     if(empty($test_e)){}else{ ?>
                                                                        <div class='mt-2'>Rack-17 --></div>
                                                                        <?php  foreach($test_e as $test1){ ?>
                                                                        <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                                                        <a class="btn  bg-danger mt-2"
                                                                            href="add_additional_part.php?scan_id=<?php echo "rack-4_".$test1[0] ?>">
                                                                            <?php } else{ ?> <a
                                                                                class="btn  bg-danger mt-2"> <?php } ?>
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
                        echo renderGrid($grid ,$slot_name_search,$search_qty,$common_slot,$test,$role_id,$department,$test_b,$test_c,$test_d,$test_e,$test_g,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
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
                        function renderGrid($grid ,$slot_name_search,$search_qty,$common_slot,$test,$role_id,$department,$test_b,$test_c,$test_d,$test_e,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q){
                        $grid = array_reverse($grid); 
                        $i =0;    
                        if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test)) {                
                          
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
                            if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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
                        <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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
                            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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
            echo renderGrid1($grid1,$slot_name_search_B,$search_qty_B,$common_slot,$test_b,$role_id,$department,$test,$test_c,$test_d,$test_e,$test_g,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
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
            function renderGrid1($grid1 ,$slot_name_search_b,$search_qty_b,$common_slot,$test_b,$role_id,$department,$test,$test_c,$test_d,$test_e,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
            {
            $grid1 = array_reverse($grid1); 
            $i =0;
            
       ?>
        <?php if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g) && empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_b)) {?>
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
                    if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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
                        <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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
                            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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
            echo renderGrid2($grid2,$slot_name_search_C,$search_qty_C,$common_slot,$test_c,$role_id,$department,$test, $test_b,$test_d,$test_e,$test_g,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
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
            function renderGrid2($grid2 ,$slot_name_search_c,$search_qty_c,$common_slot,$test_c,$role_id,$department,$test, $test_b,$test_d,$test_e,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
            {
            $grid2 = array_reverse($grid2); 
            $i =0;
            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_c)) {  
            
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
                    if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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
                        <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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
                            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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
            <?php } }
           
        ?>
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
            echo renderGrid3($grid3,$slot_name_search_d,$search_qty_d,$common_slot,$test_c,$role_id,$department,$test, $test_b,$test_d,$test_e,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
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
            function renderGrid3($grid3 ,$slot_name_search_d,$search_qty_d,$common_slot,$test_c,$role_id,$department,$test, $test_b,$test_d,$test_e,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
            {
            $grid3 = array_reverse($grid3); 
            $i =0;
            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_d)) {  
            
            ?>

                <div class="col-lg-4 col-md-6 col-sm-10 mt-5  text-uppercase mx-5">
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
                    if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                            <a class="btn grid_btn bg-secondary mt-2" href="
                            part_create_form.php?scan_id=<?php echo "rack-4_".$substring[0] ?>">
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
                                <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                <a class="btn grid_btn bg-success mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-4_".$substring[0] ?>">
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
                                    <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                    <a class="btn grid_btn bg-danger mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-4_".$substring[0] ?>">
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
            echo renderGrid4($grid4,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
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
            function renderGrid4($grid4 ,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
            {
            $grid4 = array_reverse($grid4); 
            $i =0;
            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_f)) {
            
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
                    if($substring[3] == 0){ 
                        if(empty($test_f)){   ?>
                            <!-- // slot name with empty qty -->

                            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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

                                <?php echo "</br>"; }}else{
                 
               ?>
                                <!-- slot with value -->
                                <?php if(empty($test_f)){?>
                                <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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
            foreach($test_f as $a){
               if($substring[0] == $a[0] ){ ?>
                                    <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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
            echo renderGrid5($grid5,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
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
            function renderGrid5($grid5 ,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
            {
            $grid5 = array_reverse($grid5); 
            $i =0;
            
            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_g)) {
             
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
                    if($substring[3] == 0){ 
                        if(empty($test_g)){  ?>
                            <!-- // slot name with empty qty -->
                            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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

                                <?php echo "</br>"; }}else{
                 
               ?>
                                <!-- slot with value -->
                                <?php if(empty($test_g)){?>
                                <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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
            foreach($test_g as $a){
               if($substring[0] == $a[0] ){ ?>
                                    <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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

                <!-- rack-07 -->

                <div class="col-1 mt-5 text-uppercase text-center">
                    <?php
            $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'rack-7'";
            $result_set = mysqli_query($connection, $query);
            foreach($result_set as $a){
            $slot_name = $a['slot_name'];
            $slot_name_change = $a['slot_name']."_0_0_0";
            $part_name= $a['part_name'];
            $part_model= $a['part_model'];
            $qty= $a['qty'];
            foreach($values_single3 as $k => $v){
                
                if($k == $slot_name_change){
                    $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                    $values_single3[$name] = $values_single3[$k];
                    unset($values_single3[$k]);
                }
            }
            }
            $grid6 = createGrid6(1, 25);
            $grid6 = plotGridValues6($grid6, $values_single3);
            echo renderGrid6($grid6,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
            function createGrid6($columns, $rows)
            {
            $grid6 = [];
            $cell = 1;
            for ($r = 0; $r < $rows; $r++) {
                $row = [];
                for ($c = 0; $c < $columns; $c++) {
                    $row[] = $cell++;
                }
                $grid6[] = $row;
            }
            return $grid6;
            }
            function plotGridValues6($grid6, $values_single3)
            {
            foreach ($values_single3 as $value => $coordinates) {
                list($x, $y) = $coordinates;
                $grid6[$y - 1][$x - 1] = $value;
            }
            return $grid6;
            }
            function renderGrid6($grid6 ,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
            {
            $grid6 = array_reverse($grid6); 
            $i =0;
            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_h)) {
             
            ?>
                    <div class="card card-primary">
                        <div class="card-header" ;>
                            <h4 class=" card-title">Rack 07</h4>


                        </div>
                        <div class="card-body mx-auto justify-content-center mx-auto text-center">
                            <?php  foreach ($grid6 as $row) { 
                
                foreach ($row as $k=>$v) { 
                    $substring = explode("_", $v);
                    //   empty qty 
                    if($substring[3] == 0){
                        if(empty($test_h)){   ?>
                            <!-- // slot name with empty qty -->
                            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                            <a class="btn grid_btn bg-secondary mt-2" href="
                            part_create_form.php?scan_id=<?php echo "rack-7_".$substring[0] ?>">
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
                                <?php if(empty($test_h)){?>
                                <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                <a class="btn grid_btn bg-success mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-7_".$substring[0] ?>">
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
            foreach($test_h as $a){
               if($substring[0] == $a[0] ){ ?>
                                    <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                    <a class="btn grid_btn bg-danger mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-7_".$substring[0] ?>">
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
                <!-- rack -8 -->

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
                    $values_single4[$name] = $values_single4[$k];
                    unset($values_single4[$k]);
                }
            }
            }
            $grid7 = createGrid7(1, 25);
            $grid7 = plotGridValues7($grid7, $values_single4);
            echo renderGrid7($grid7,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
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
            function renderGrid7($grid7 ,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
            {
            $grid7 = array_reverse($grid7); 
            $i =0;
            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_i)) {
             
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
                    if($substring[3] == 0){
                        if(empty($test_i)){   ?>
                            <!-- // slot name with empty qty -->
                            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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

                                <?php echo "</br>"; } }else{
                 
               ?>
                                <!-- slot with value -->
                                <?php if(empty($test_i)){?>
                                <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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
                                    <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
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
                <!-- rack-09 -->

                <div class="col-1 mt-5 text-uppercase text-center">
                    <?php
            $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'rack-9'";
            $result_set = mysqli_query($connection, $query);
            foreach($result_set as $a){
            $slot_name = $a['slot_name'];
            $slot_name_change = $a['slot_name']."_0_0_0";
            $part_name= $a['part_name'];
            $part_model= $a['part_model'];
            $qty= $a['qty'];
            foreach($values_single5 as $k => $v){
                
                if($k == $slot_name_change){
                    $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                    $values_single5[$name] = $values_single5[$k];
                    unset($values_single5[$k]);
                }
            }
            }
            $grid8 = createGrid8(1, 25);
            $grid8 = plotGridValues8($grid8, $values_single5);
            echo renderGrid8($grid8,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
            function createGrid8($columns, $rows)
            {
            $grid8 = [];
            $cell = 1;
            for ($r = 0; $r < $rows; $r++) {
                $row = [];
                for ($c = 0; $c < $columns; $c++) {
                    $row[] = $cell++;
                }
                $grid8[] = $row;
            }
            return $grid8;
            }
            function plotGridValues8($grid8, $values_single5)
            {
            foreach ($values_single5 as $value => $coordinates) {
                list($x, $y) = $coordinates;
                $grid8[$y - 1][$x - 1] = $value;
            }
            return $grid8;
            }
            function renderGrid8($grid8 ,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
            {
            $grid8 = array_reverse($grid8); 
            $i =0;
            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_j)) {
             
            ?>
                    <div class="card card-primary">
                        <div class="card-header" ;>
                            <h4 class=" card-title">Rack 09</h4>


                        </div>
                        <div class="card-body mx-auto justify-content-center mx-auto text-center">
                            <?php  foreach ($grid8 as $row) { 
                
                foreach ($row as $k=>$v) { 
                    $substring = explode("_", $v);
                    //   empty qty 
                    if($substring[3] == 0){ 
                        if(empty($test_j)){   ?>
                            <!-- // slot name with empty qty -->
                            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                            <a class="btn grid_btn bg-secondary mt-2" href="
                            part_create_form.php?scan_id=<?php echo "rack-9_".$substring[0] ?>">
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
                                <?php if(empty($test_j)){?>
                                <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                <a class="btn grid_btn bg-success mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-9_".$substring[0] ?>">
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
            foreach($test_j as $a){
               if($substring[0] == $a[0] ){ ?>
                                    <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                    <a class="btn grid_btn bg-danger mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-9_".$substring[0] ?>">
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
                <!-- rack -10 -->

                <div class="col-1 mt-5 text-uppercase text-center">
                    <?php
            $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'rack-10'";
            $result_set = mysqli_query($connection, $query);
            foreach($result_set as $a){
            $slot_name = $a['slot_name'];
            $slot_name_change = $a['slot_name']."_0_0_0";
            $part_name= $a['part_name'];
            $part_model= $a['part_model'];
            $qty= $a['qty'];
            foreach($values_single6 as $k => $v){
                
                if($k == $slot_name_change){
                    $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                    $values_single6[$name] = $values_single6[$k];
                    unset($values_single6[$k]);
                }
            }
            }
            $grid9 = createGrid9(1, 25);
            $grid9 = plotGridValues9($grid9, $values_single6);
            echo renderGrid9($grid9,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
            function createGrid9($columns, $rows)
            {
            $grid9 = [];
            $cell = 1;
            for ($r = 0; $r < $rows; $r++) {
                $row = [];
                for ($c = 0; $c < $columns; $c++) {
                    $row[] = $cell++;
                }
                $grid9[] = $row;
            }
            return $grid9;
            }
            function plotGridValues9($grid9, $values_single6)
            {
            foreach ($values_single6 as $value => $coordinates) {
                list($x, $y) = $coordinates;
                $grid9[$y - 1][$x - 1] = $value;
            }
            return $grid9;
            }
            function renderGrid9($grid9 ,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
            {
            $grid9 = array_reverse($grid9); 
            $i =0;
            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_k)) {
             
            ?>
                    <div class="card card-primary">
                        <div class="card-header" ;>
                            <h4 class=" card-title">Rack 10</h4>
                        </div>
                        <div class="card-body mx-auto justify-content-center mx-auto text-center">
                            <?php  foreach ($grid9 as $row) { 
                
                foreach ($row as $k=>$v) { 
                    $substring = explode("_", $v);
                    //   empty qty 
                    if($substring[3] == 0){ 
                        if(empty($test_k)){   ?>
                            <!-- // slot name with empty qty -->
                            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                            <a class="btn grid_btn bg-secondary mt-2" href="
                            part_create_form.php?scan_id=<?php echo "rack-10_".$substring[0] ?>">
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
                                <?php if(empty($test_k)){?>
                                <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                <a class="btn grid_btn bg-success mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-10_".$substring[0] ?>">
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
            foreach($test_k as $a){
               if($substring[0] == $a[0] ){ ?>
                                    <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                    <a class="btn grid_btn bg-danger mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-10_".$substring[0] ?>">
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

                <!-- rack -11 -->
                <div class="col-1 mt-5 text-uppercase text-center">
                    <?php
            $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'rack-11'";
            $result_set = mysqli_query($connection, $query);
            foreach($result_set as $a){
            $slot_name = $a['slot_name'];
            $slot_name_change = $a['slot_name']."_0_0_0";
            $part_name= $a['part_name'];
            $part_model= $a['part_model'];
            $qty= $a['qty'];
            foreach($values_single7 as $k => $v){
                
                if($k == $slot_name_change){
                    $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                    $values_single7[$name] = $values_single7[$k];
                    unset($values_single7[$k]);
                }
            }
            }
            $grid10 = createGrid10(1, 25);
            $grid10 = plotGridValues10($grid10, $values_single7);
            echo renderGrid10($grid10,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
            function createGrid10($columns, $rows)
            {
            $grid10 = [];
            $cell = 1;
            for ($r = 0; $r < $rows; $r++) {
                $row = [];
                for ($c = 0; $c < $columns; $c++) {
                    $row[] = $cell++;
                }
                $grid10[] = $row;
            }
            return $grid10;
            }
            function plotGridValues10($grid10, $values_single7)
            {
            foreach ($values_single7 as $value => $coordinates) {
                list($x, $y) = $coordinates;
                $grid10[$y - 1][$x - 1] = $value;
            }
            return $grid10;
            }
            function renderGrid10($grid10 ,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
            {
            $grid10 = array_reverse($grid10); 
            $i =0;
            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_l)) {
             
            ?>
                    <div class="card card-primary">
                        <div class="card-header" ;>
                            <h4 class=" card-title">Rack 11</h4>


                        </div>
                        <div class="card-body mx-auto justify-content-center mx-auto text-center">
                            <?php  foreach ($grid10 as $row) { 
                
                foreach ($row as $k=>$v) { 
                    $substring = explode("_", $v);
                    //   empty qty 
                    if($substring[3] == 0){ 
                        if(empty($test_l)){   ?>
                            <!-- // slot name with empty qty -->
                            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                            <a class="btn grid_btn bg-secondary mt-2" href="
                            part_create_form.php?scan_id=<?php echo "rack-11_".$substring[0] ?>">
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
                                <?php if(empty($test_l)){?>
                                <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                <a class="btn grid_btn bg-success mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-11_".$substring[0] ?>">
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
            foreach($test_l as $a){
               if($substring[0] == $a[0] ){ ?>
                                    <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                                    <a class="btn grid_btn bg-danger mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-11_".$substring[0] ?>">
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
        <!-- //////////////////////////////////////// -->
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
                            echo renderGrid11($grid11,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
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
                            function renderGrid11($grid11 ,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
                            {
                            $grid11 = array_reverse($grid11); 
                            $i =0;
                            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_m)) {
                            
                            ?>
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
                        <a class="btn grid_btn bg-success mt-2" href="
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
                                                add_additional_part.php?scan_id=<?php echo "rack-11_".$substring[0] ?>">
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
               
                                    } }  ?>
                                <?php  } } } } ?>
                </div>
            </div>
            <?php } } ?>
        </div>

        <!-- rack-13 -->
        <div class="col-1 mt-5 text-uppercase text-center">
            <?php
                            $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'rack-13'";
                            $result_set = mysqli_query($connection, $query);
                            foreach($result_set as $a){
                            $slot_name = $a['slot_name'];
                            $slot_name_change = $a['slot_name']."_0_0_0";
                            $part_name= $a['part_name'];
                            $part_model= $a['part_model'];
                            $qty= $a['qty'];
                            foreach($values_single9 as $k => $v){
                                
                                if($k == $slot_name_change){
                                    $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                                    $values_single9[$name] = $values_single9[$k];
                                    unset($values_single9[$k]);
                                }
                            }
                            }
                            $grid13 = createGrid13(1, 25);
                            $grid13 = plotGridValues13($grid13, $values_single9);
                            echo renderGrid13($grid13,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
                            function createGrid13($columns, $rows)
                            {
                            $grid13 = [];
                            $cell = 1;
                            for ($r = 0; $r < $rows; $r++) {
                                $row = [];
                                for ($c = 0; $c < $columns; $c++) {
                                    $row[] = $cell++;
                                }
                                $grid13[] = $row;
                            }
                            return $grid13;
                            }
                            function plotGridValues13($grid13, $values_single9)
                            {
                            foreach ($values_single9 as $value => $coordinates) {
                                list($x, $y) = $coordinates;
                                $grid13[$y - 1][$x - 1] = $value;
                            }
                            return $grid13;
                            }
                            function renderGrid13($grid13 ,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
                            {
                            $grid13 = array_reverse($grid13); 
                            $i =0;
                            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m)&& empty($test_n) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_n)) {
                            
                            ?>
            <div class="card card-primary">
                <div class="card-header" ;>
                    <h4 class=" card-title">Rack 13</h4>


                </div>
                <div class="card-body mx-auto justify-content-center mx-auto text-center">
                    <?php  foreach ($grid13 as $row) { 
                
                foreach ($row as $k=>$v) { 
                    $substring = explode("_", $v);
                    //   empty qty 
                    if($substring[3] == 0){ 
                        if(empty($$test_n)){   ?>
                    <!-- // slot name with empty qty -->
                    <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                    <a class="btn grid_btn bg-secondary mt-2" href="
                            part_create_form.php?scan_id=<?php echo "rack-13_".$substring[0] ?>">
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
                        <?php if(empty($$test_n)){?>
                        <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                        <a class="btn grid_btn bg-success mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-13_".$substring[0] ?>">
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
                            foreach($$test_n as $a){
                            if($substring[0] == $a[0] ){ ?>
                            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                            <a class="btn grid_btn bg-danger mt-2"
                                href="
                                                add_additional_part.php?scan_id=<?php echo "rack-13_".$substring[0] ?>">
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
               
                                    } }  ?>
                                <?php  } } } } ?>
                </div>
            </div>
            <?php } } ?>
        </div>

        <!-- rack 14 -->
        <div class="col-1 mt-5 text-uppercase text-center">
            <?php
                            $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'rack-14'";
                            $result_set = mysqli_query($connection, $query);
                            foreach($result_set as $a){
                            $slot_name = $a['slot_name'];
                            $slot_name_change = $a['slot_name']."_0_0_0";
                            $part_name= $a['part_name'];
                            $part_model= $a['part_model'];
                            $qty= $a['qty'];
                            foreach($values_single10 as $k => $v){
                                
                                if($k == $slot_name_change){
                                    $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                                    $values_single10[$name] = $values_single10[$k];
                                    unset($values_single10[$k]);
                                }
                            }
                            }
                            $grid14 = createGrid14(1, 25);
                            $grid14 = plotGridValues14($grid14, $values_single10);
                            echo renderGrid14($grid14,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
                            function createGrid14($columns, $rows)
                            {
                            $grid14 = [];
                            $cell = 1;
                            for ($r = 0; $r < $rows; $r++) {
                                $row = [];
                                for ($c = 0; $c < $columns; $c++) {
                                    $row[] = $cell++;
                                }
                                $grid14[] = $row;
                            }
                            return $grid14;
                            }
                            function plotGridValues14($grid14, $values_single10)
                            {
                            foreach ($values_single10 as $value => $coordinates) {
                                list($x, $y) = $coordinates;
                                $grid14[$y - 1][$x - 1] = $value;
                            }
                            return $grid14;
                            }
                            function renderGrid14($grid14 ,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
                            {
                            $grid14 = array_reverse($grid14); 
                            $i =0;
                            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m)&& empty($test_n) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_o)) {
                            
                            ?>
            <div class="card card-primary">
                <div class="card-header" ;>
                    <h4 class=" card-title">Rack 14</h4>


                </div>
                <div class="card-body mx-auto justify-content-center mx-auto text-center">
                    <?php  foreach ($grid14 as $row) { 
                
                foreach ($row as $k=>$v) { 
                    $substring = explode("_", $v);
                    //   empty qty 
                    if($substring[3] == 0){ 
                        if(empty($$test_o)){   ?>
                    <!-- // slot name with empty qty -->
                    <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                    <a class="btn grid_btn bg-secondary mt-2" href="
                            part_create_form.php?scan_id=<?php echo "rack-14_".$substring[0] ?>">
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
                        <?php if(empty($test_o)){?>
                        <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                        <a class="btn grid_btn bg-success mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-14_".$substring[0] ?>">
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
                            foreach($$test_o as $a){
                            if($substring[0] == $a[0] ){ ?>
                            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                            <a class="btn grid_btn bg-danger mt-2"
                                href="
                                                add_additional_part.php?scan_id=<?php echo "rack-14_".$substring[0] ?>">
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
               
                                    } }  ?>
                                <?php  } } } } ?>
                </div>
            </div>
            <?php } } ?>
        </div>
        <!-- rack 15 -->
        <div class="col-1 mt-5 text-uppercase text-center">
            <?php
                            $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'rack-15'";
                            $result_set = mysqli_query($connection, $query);
                            foreach($result_set as $a){
                            $slot_name = $a['slot_name'];
                            $slot_name_change = $a['slot_name']."_0_0_0";
                            $part_name= $a['part_name'];
                            $part_model= $a['part_model'];
                            $qty= $a['qty'];
                            foreach($values_single11 as $k => $v){
                                
                                if($k == $slot_name_change){
                                    $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                                    $values_single11[$name] = $values_single11[$k];
                                    unset($values_single11[$k]);
                                }
                            }
                            }
                            $grid15 = createGrid15(1, 25);
                            $grid15 = plotGridValues15($grid15, $values_single11);
                            echo renderGrid15($grid15,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
                            function createGrid15($columns, $rows)
                            {
                            $grid15 = [];
                            $cell = 1;
                            for ($r = 0; $r < $rows; $r++) {
                                $row = [];
                                for ($c = 0; $c < $columns; $c++) {
                                    $row[] = $cell++;
                                }
                                $grid15[] = $row;
                            }
                            return $grid15;
                            }
                            function plotGridValues15($grid15, $values_single11)
                            {
                            foreach ($values_single11 as $value => $coordinates) {
                                list($x, $y) = $coordinates;
                                $grid15[$y - 1][$x - 1] = $value;
                            }
                            return $grid15;
                            }
                            function renderGrid15($grid15 ,$slot_name_search_e,$search_qty_e,$common_slot,$test_e,$role_id,$department,$test, $test_b,$test_c,$test_d,$test_g,$test_f,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
                            {
                            $grid15 = array_reverse($grid15); 
                            $i =0;
                            if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m)&& empty($test_n) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_p)) {
                            
                            ?>
            <div class="card card-primary">
                <div class="card-header" ;>
                    <h4 class=" card-title">Rack 15</h4>


                </div>
                <div class="card-body mx-auto justify-content-center mx-auto text-center">
                    <?php  foreach ($grid15 as $row) { 
                
                foreach ($row as $k=>$v) { 
                    $substring = explode("_", $v);
                    //   empty qty 
                    if($substring[3] == 0){ 
                        if(empty($test_p)){   ?>
                    <!-- // slot name with empty qty -->
                    <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                    <a class="btn grid_btn bg-secondary mt-2" href="
                            part_create_form.php?scan_id=<?php echo "rack-15_".$substring[0] ?>">
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
                        <?php if(empty($test_p)){?>
                        <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                        <a class="btn grid_btn bg-success mt-2" href="
                                add_additional_part.php?scan_id=<?php echo "rack-15_".$substring[0] ?>">
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
                            foreach($test_p as $a){
                            if($substring[0] == $a[0] ){ ?>
                            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                            <a class="btn grid_btn bg-danger mt-2"
                                href="
                                                add_additional_part.php?scan_id=<?php echo "rack-15_".$substring[0] ?>">
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
               
                                    } }  ?>
                                <?php  } } } } ?>
                </div>
            </div>
            <?php } } ?>
        </div>
        <!-- rack 16 -->
        <?php
        
        $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'RACK-16'";
        $result_set = mysqli_query($connection, $query);
        foreach($result_set as $a){
        $slot_name = $a['slot_name'];
        $slot_name_change = $a['slot_name']."_0_0_0";
        $part_name= $a['part_name'];
        $part_model= $a['part_model'];
        $qty= $a['qty'];
        foreach($values4 as $k => $v){
            
            if($k == $slot_name_change){
                $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                $values4[$name] = $values4[$k];
                unset($values4[$k]);
            }
        }
        }
        $grid16 = createGrid16(5, 20);
        $grid16 = plotGridValues16($grid16, $values4);
        echo renderGrid16($grid16,$slot_name_search_C,$search_qty_C,$common_slot,$test_c,$role_id,$department,$test, $test_b,$test_d,$test_e,$test_g,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
        function createGrid16($columns, $rows)
        {
        $grid16 = [];
        $cell = 1;
        for ($r = 0; $r < $rows; $r++) {
            $row = [];
            for ($c = 0; $c < $columns; $c++) {
                $row[] = $cell++;
            }
            $grid16[] = $row;
        }
        return $grid16;
        }
        function plotGridValues16($grid16, $values4)
        {
        foreach ($values4 as $value => $coordinates) {
            list($x, $y) = $coordinates;
            $grid16[$y - 1][$x - 1] = $value;
        }
        return $grid16;
        }
        function renderGrid16($grid16 ,$slot_name_search_c,$search_qty_c,$common_slot,$test_c,$role_id,$department,$test, $test_b,$test_d,$test_e,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
        {
        $grid16 = array_reverse($grid16); 
        $i =0;
        if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_e)) {  
        
   ?>
        <div class="col-4 mt-5 text-uppercase">
            <div class="card card-primary">
                <div class="card-header" ;>
                    <h4 class=" card-title">Rack 16</h4>


                </div>
                <div class="card-body mx-auto justify-content-center mx-auto text-center">
                    <?php  foreach ($grid16 as $row) { 
            
            foreach ($row as $k=>$v) { 
                $substring = explode("_", $v);
                //   empty qty 
                if($substring[3] == 0){ ?>
                    <!-- // slot name with empty qty -->
                    <?php 
                if(empty($test_c)){
                if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                    <a class="btn grid_btn bg-secondary mt-2" href="
                        part_create_form.php?scan_id=<?php echo "rack-16_".$substring[0] ?>">
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
                            add_additional_part.php?scan_id=<?php echo "rack-16_".$substring[0] ?>">
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
                            add_additional_part.php?scan_id=<?php echo "rack-16_".$substring[0] ?>">
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
        <!-- rack 17 -->
        <?php
        
        $query = "SELECT slot_name,part_name,part_model,qty FROM part_stock WHERE rack_number = 'RACK-17'";
        $result_set = mysqli_query($connection, $query);
        foreach($result_set as $a){
        $slot_name = $a['slot_name'];
        $slot_name_change = $a['slot_name']."_0_0_0";
        $part_name= $a['part_name'];
        $part_model= $a['part_model'];
        $qty= $a['qty'];
        foreach($values5 as $k => $v){
            
            if($k == $slot_name_change){
                $name= $slot_name."_".$part_name."_".$part_model."_".$qty;
                $values5[$name] = $values5[$k];
                unset($values5[$k]);
            }
        }
        }
        $grid17 = createGrid17(5, 20);
        $grid17 = plotGridValues17($grid17, $values5);
        echo renderGrid17($grid17,$slot_name_search_C,$search_qty_C,$common_slot,$test_c,$role_id,$department,$test, $test_b,$test_d,$test_e,$test_g,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q);
        function createGrid17($columns, $rows)
        {
        $grid17 = [];
        $cell = 1;
        for ($r = 0; $r < $rows; $r++) {
            $row = [];
            for ($c = 0; $c < $columns; $c++) {
                $row[] = $cell++;
            }
            $grid17[] = $row;
        }
        return $grid17;
        }
        function plotGridValues17($grid17, $values5)
        {
        foreach ($values5 as $value => $coordinates) {
            list($x, $y) = $coordinates;
            $grid17[$y - 1][$x - 1] = $value;
        }
        return $grid17;
        }
        function renderGrid17($grid17 ,$slot_name_search_c,$search_qty_c,$common_slot,$test_c,$role_id,$department,$test, $test_b,$test_d,$test_e,$test_f,$test_g,$test_h,$test_i,$test_j,$test_k,$test_l,$test_m,$test_n,$test_o,$test_p,$test_q)
        {
        $grid17 = array_reverse($grid17); 
        $i =0;
        if((empty($test) && empty($test_b) && empty($test_c) && empty($test_d) && empty($test_e) && empty($test_f) && empty($test_g)&& empty($test_h) && empty($test_i) && empty($test_j) && empty($test_k)&& empty($test_l)&& empty($test_m) && empty($test_o) && empty($test_p) && empty($test_q)) || !empty($test_p)) {  
        
   ?>
        <div class="col-4 mt-5 text-uppercase">
            <div class="card card-primary">
                <div class="card-header" ;>
                    <h4 class=" card-title">Rack 17</h4>


                </div>
                <div class="card-body mx-auto justify-content-center mx-auto text-center">
                    <?php  foreach ($grid17 as $row) { 
            
            foreach ($row as $k=>$v) { 
                $substring = explode("_", $v);
                //   empty qty 
                if($substring[3] == 0){ ?>
                    <!-- // slot name with empty qty -->
                    <?php 
                if(empty($test_p)){
                if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                    <a class="btn grid_btn bg-secondary mt-2" href="
                        part_create_form.php?scan_id=<?php echo "rack-17_".$substring[0] ?>">
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
                        <?php if(empty($test_p)){?>
                        <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                        <a class="btn grid_btn bg-success mt-2" href="
                            add_additional_part.php?scan_id=<?php echo "rack-17_".$substring[0] ?>">
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
        foreach($test_p as $a){
           if($substring[0] == $a[0] ){ ?>
                            <?php if(($role_id == 4 && $department ==20) || ($role_id == 2 && $department ==18)){ ?>
                            <a class="btn grid_btn bg-danger mt-2" href="
                            add_additional_part.php?scan_id=<?php echo "rack-17_".$substring[0] ?>">
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
        <!-- rack 18  -->
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

    </div>
</div>
<script>
let searchbar = document.querySelector('input[name="model"]');
searchbar.focus();
search.value = '';
</script>

<?php include_once('../includes/footer.php');  ?>