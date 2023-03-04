<?php
	$connection = mysqli_connect("localhost", "root", "", "wms");
	if (isset($_GET['brand']) ) {

		$brand = mysqli_real_escape_string($connection, $_GET['brand']);
		$query 		= "SELECT DISTINCT model FROM warehouse_information_sheet WHERE brand = '{$brand}'";
		$result_set = mysqli_query($connection, $query);

		$model_list = "<option selected>--Select model--</option>";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$model_list .= "<option value=\"{$result['model']}\" class='info_select'>{$result['model']}</option>";
		}
		echo $model_list;
	} else {
		echo "<option>Error</option>";
	}

	
?>