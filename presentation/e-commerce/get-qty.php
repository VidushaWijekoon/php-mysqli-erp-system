<?php
	$connection = mysqli_connect("localhost", "root", "", "wms");
	if ( isset($_GET['generation']) ) {
        $brand = mysqli_real_escape_string($connection, $_GET['brand']);
		$model = mysqli_real_escape_string($connection, $_GET['model']);
        $core = mysqli_real_escape_string($connection, $_GET['core']);
        $generation = mysqli_real_escape_string($connection, $_GET['generation']);
		$query 		= "SELECT  COUNT(*) AS qty FROM warehouse_information_sheet WHERE core = '{$core}' AND model = '{$model}' AND brand ='{$brand}' AND generation ='{$generation}'";
		echo $query;
        $result_set = mysqli_query($connection, $query);

		$qty = "<option selected>--Select Generation--</option>";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$qty .= "<option value=\"{$result['qty']}\" class='info_select'>{$result['qty']}</option>";
		}
		echo $qty;
	} else {
		echo "<option>Error</option>";
	}

	
?>