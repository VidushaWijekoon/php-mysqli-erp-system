<?php
	$connection = mysqli_connect("localhost", "root", "", "wms");
    
	if ( isset($_GET['model']) ) {
		$model = mysqli_real_escape_string($connection, $_GET['model']);
        // $core = mysqli_real_escape_string($connection, $_GET['core']);
		$brand = mysqli_real_escape_string($connection, $_GET['brand']);
		$name = null;
		$name = $brand."_model";
	
		$query 	= "SELECT DISTINCT generation FROM `machine_from_supplier` WHERE brand='$brand' AND model='$model' ";
		$result_set = mysqli_query($connection, $query);

		$generation_list = "";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$generation_list .= "<option value=\"{$result['generation']}\" class='info_select'>{$result['generation']}</option>";
		}
		echo $generation_list;
	} else {
		echo "<option>Error</option>";
	}

	
?>