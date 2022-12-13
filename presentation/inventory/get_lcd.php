<?php
	$connection = mysqli_connect("localhost", "root", "", "wms");
    
	if ( isset($_GET['model']) ) {
		$model = mysqli_real_escape_string($connection, $_GET['model']);
        // $generation = mysqli_real_escape_string($connection, $_GET['generation']);
		// $brand = mysqli_real_escape_string($connection, $_GET['brand']);
		$name = null;
		// $name = $brand."_model";
	
		$query 	= "SELECT DISTINCT display_size AS lcd_size FROM `screen_resolution` LEFT JOIN machine_from_supplier ON machine_from_supplier.model = screen_resolution.model WHERE screen_resolution.model='$model' ";
		$result_set = mysqli_query($connection, $query);

		$lcd_list = " ";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$lcd_list .= "<option value=\"{$result['lcd_size']}\" class='info_select'>{$result['lcd_size']}</option>";
		}
		echo $lcd_list;
	} else {
		echo "<option>Error</option>";
	}

	
?>