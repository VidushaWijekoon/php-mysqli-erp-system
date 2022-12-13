<?php
	$connection = mysqli_connect("localhost", "root", "", "wms");
    
	if ( isset($_GET['model']) ) {
		
		$model = mysqli_real_escape_string($connection, $_GET['model']);
        $brand = mysqli_real_escape_string($connection, $_GET['brand']);
		$name = null;
		$name = $brand."_model";
	
		$query 	= "SELECT DISTINCT core FROM `machine_from_supplier` WHERE brand='$brand' AND model='$model' ";
		$result_set = mysqli_query($connection, $query);

		$cpu_list = "";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$cpu_list .= "<option value=\"{$result['core']}\" class='info_select'>{$result['core']}</option>";
		}
		echo $cpu_list;
	} else {
		echo "<option>Error</option>";
	}
	
?>