<?php
	$connection = mysqli_connect("localhost", "root", "", "wms");
    
	if ( isset($_GET['model']) ) {
		$model = mysqli_real_escape_string($connection, $_GET['model']);
        // $core = mysqli_real_escape_string($connection, $_GET['core']);
		$brand = mysqli_real_escape_string($connection, $_GET['brand']);

		$query 	= "SELECT DISTINCT resolution FROM `machine_from_supplier` WHERE brand='$brand' AND model='$model' ";
		$result_set = mysqli_query($connection, $query);

		$screen_resolution_list = "";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$screen_resolution_list .= "<option value=\"{$result['resolution']}\" class='info_select'>{$result['resolution']}</option>";
		}
		echo $screen_resolution_list;
	} else {
		echo "<option>Error</option>";
	}

	
?>