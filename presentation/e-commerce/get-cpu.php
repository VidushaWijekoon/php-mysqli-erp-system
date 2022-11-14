<?php
	$connection = mysqli_connect("localhost", "root", "", "wms");
    
	if ( isset($_GET['model']) ) {
		$model = mysqli_real_escape_string($connection, $_GET['model']);
        $brand = mysqli_real_escape_string($connection, $_GET['brand']);
		$query 		= "SELECT DISTINCT core FROM warehouse_information_sheet WHERE model = '{$model}' AND brand = '{$brand}'";
		$result_set = mysqli_query($connection, $query);

		$cpu_list = " <option selected>--Select CPU--</option>";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$cpu_list .= "<option value=\"{$result['core']}\" class='info_select'>{$result['core']}</option>";
		}
		echo $cpu_list;
	} else {
		echo "<option>Error</option>";
	}
	
?>