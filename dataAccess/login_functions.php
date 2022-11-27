<?php 

function Login($role_id, $department){
    if($role_id == 1 && $department == 11){
        header('Location: presentation/includes/main.php');
    }

    // Admin Redirect
    elseif($role_id == 2 && $department == 18){
        header('Location: presentation/includes/main.php');
    }
    
    // Inventory Team Member Redirect
    elseif($role_id == 4 && $department == 2){
        header('Location: presentation/inventory/warehouse_dashboard.php');
    }
    // Inventory Team Member Redirect
    elseif($role_id == 10 && $department == 2){
        header('Location: presentation/inventory/warehouse_member_sales_order.php');
    }
     elseif($role_id == 4 && $department == 2){
        header('Location: presentation/inventory/warehouse_dashboard.php');
    }
    
    // Part Team Redirect
    elseif($role_id == 4 && $department == 20){
        header('Location: presentation/part/part_warehouse_leader_dashboard.php');
    }
    
    // Production Team Leader Redirect
    elseif($role_id == 4 && $department == 1){
        header('Location: presentation/production/production_team_leader_dashboard.php');
    }
    // Production Technician Redirect
    elseif($role_id == 6 && $department == 1){
        header('Location: presentation/production/production_technician_dashboard.php');
    }

    // Motherboard Team Leader Redirect
     elseif($role_id == 4 && $department == 9){
        header('Location: presentation/motherboard/motherboard_dashboard.php');
    }
    // Motherboard Technician Redirect
    elseif($role_id == 6 && $department == 9){
        header('Location: presentation/motherboard/motherboard_technician.php');
    }
     // QC Team Leader Redirect
     elseif($role_id == 4 && $department == 19){
        header('Location: presentation/qc/create_mfg.php');
    }
    // Packing Technician Redirect
    elseif($role_id == 4 && $department == 13){
        header('Location: presentation/packing/packing.php');
    }
   

}


?>