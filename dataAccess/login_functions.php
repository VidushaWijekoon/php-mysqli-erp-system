<?php 

function Login($role_id, $department){
    if($role_id == 1 && $department == 11){
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
    // Part Team Leader Redirect
    elseif($role_id == 4 && $department == 22){
        header('Location: presentation/part/part_warehouse_leader_dashboard.php');
    }
    // Part Member Redirect
    elseif($role_id == 11 && $department == 22){
        header('Location: presentation/part/part_warehouse_member_dashbaord.php');
    }

    // Production Team Leader Redirect
    elseif($role_id == 4 && $department == 1){
        header('Location: presentation/production/production_team_leader_dashboard.php');
    }
    // Production Technician Redirect
    elseif($role_id == 6 && $department == 1){
        header('Location: presentation/production/production_technician_dashboard.php');
    }
    // 7 Body Work 10 == Genaral Worker
    elseif($role_id == 10 && $department == 7){
        // header('Location: presentation/inventory/warehouse_member_sales_order.php');
    }
    //8 Paint 10 == Genaral Worker
    elseif($role_id == 10 && $department == 8){
        // header('Location: presentation/inventory/warehouse_member_sales_order.php');
    }
    //13 Packing 10 == Genaral Worker
    elseif($role_id == 10 && $department == 13){
        // header('Location: presentation/inventory/warehouse_member_sales_order.php');
    }
    //8 HR 
    elseif($role_id == 8 && $department == 4){
        header('Location: presentation/includes/main.php');
    }
    // Sales 
    elseif($role_id == 8 && $department == 4){
        header('Location: presentation/sales/sales_dashboard.php');
    }
   

}


?>