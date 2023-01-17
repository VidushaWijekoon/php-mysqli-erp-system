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

    elseif($role_id == 5 && $department == 5){
        header('Location: presentation/sales/sales_dashboard.php');
    }
    
    // Part Team Redirect
    elseif($role_id == 4 && $department == 20){
        header('Location: presentation/part/part_warehouse_leader_dashboard.php');
    }
    
    // Production Team Leader Redirect
    elseif( $department == 1){
        header('Location: presentation/performance/performance_record.php');
    }
    // Production Technician Redirect
    elseif($role_id == 6 && $department == 1){
        header('Location: presentation/production/production_technician_dashboard.php');
    }

    // Motherboard Team Leader Redirect
     elseif( $department == 9){
        header('Location: presentation/performance/performance_record.php');
    }
    // Motherboard Technician Redirect
    elseif( $department == 9){
        header('Location: presentation/performance/performance_record.php');
    }
     // QC Team Leader Redirect
     elseif($department == 19){
        header('Location: presentation/performance/qc_performance_record.php');
    }
    // Packing Technician Redirect
    elseif($department == 13){
        header('Location: presentation/performance/performance_record.php');
    } 
    // LCD Technician Redirect
    elseif( $department == 10){
        header('Location: presentation/performance/performance_record.php');
    }
    // bodywork Technician Redirect
    elseif($department == 7){
        header('Location: presentation/performance/performance_record.php');
    }
    // painting Technician Redirect
    elseif( $department == 8){
        header('Location: presentation/performance/performance_record.php');
    }
    elseif($department == 14){
        header('Location: presentation/performance/performance_record.php');
    }
    elseif($department == 22){
        header('Location: presentation/performance/performance_record.php');
    }
    elseif($department == 2){
        header('Location: presentation/performance/performance_record.php');
    }
    elseif($department == 23){
        header('Location: presentation/performance/performance_record.php');
    }

    // Production Team Leader Redirect
    elseif($department == 5 && $role_id == 5){
        header('Location: presentation/sales/sales_dashboard.php');
    }
    elseif($department == 5 && $role_id == 8){
           header('Location: presentation/sales/sales_team_leader_dashboard.php');
    }

}


?>