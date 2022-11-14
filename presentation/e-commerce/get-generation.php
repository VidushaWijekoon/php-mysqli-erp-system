<?php
	$connection = mysqli_connect("localhost", "root", "", "wms");
    
	if ( isset($_GET['core']) ) {
		$model = mysqli_real_escape_string($connection, $_GET['model']);
        $core = mysqli_real_escape_string($connection, $_GET['core']);
		$query 		= "SELECT DISTINCT generation FROM warehouse_information_sheet WHERE core = '{$core}' AND model = '{$model}'";
		$result_set = mysqli_query($connection, $query);

		$generation_list = "<option selected>--Select Generation--</option>";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$generation_list .= "<option value=\"{$result['generation']}\" class='info_select'>{$result['generation']}</option>";
		}
		echo $generation_list;
	} else {
		echo "<option>Error</option>";
	}

	
?>