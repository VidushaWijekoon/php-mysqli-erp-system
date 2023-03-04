<?php
	$connection = mysqli_connect("localhost", "root", "", "wms");
    
	if ( isset($_GET['model']) ) {
		$model = mysqli_real_escape_string($connection, $_GET['model']);
        // $generation = mysqli_real_escape_string($connection, $_GET['generation']);
		// $brand = mysqli_real_escape_string($connection, $_GET['brand']);
		$name = null;
		// $name = $brand."_model";
	
		$query 	= "SELECT DISTINCT speed FROM `machine_from_supplier` WHERE  model='$model' ";
		$result_set = mysqli_query($connection, $query);

		$speed_list = " ";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$speed_list .= "<option value=\"{$result['speed']}\" class='info_select'>{$result['speed']}</option>";
		}
		echo $speed_list;
	} else {
		echo "<option>Error</option>";
	}

	
?>