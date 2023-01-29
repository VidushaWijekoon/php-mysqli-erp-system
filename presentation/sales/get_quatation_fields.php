<?php
	$connection = mysqli_connect("localhost", "root", "", "wms");
	
	if (isset($_GET['device']) ) {

		$device = mysqli_real_escape_string($connection, $_GET['device']);
		$query 		= "SELECT DISTINCT brand FROM warehouse_information_sheet WHERE device = '{$device}'";
		$result_set = mysqli_query($connection, $query);
        
		$brand_list = "<option selected>--Select Brand--</option>";
		while ($result = mysqli_fetch_assoc($result_set) ) {
			$brand_list .= "<option value=\"{$result['brand']}\" class='info_select'>{$result['brand']}</option>";
		}
		echo $brand_list;
	} 
	
 	if (isset($_GET['brand']) ) {

		$brand = mysqli_real_escape_string($connection, $_GET['brand']);
		$query 		= "SELECT DISTINCT model FROM warehouse_information_sheet WHERE brand = '{$brand}'";
		$result_set = mysqli_query($connection, $query);
        
		$model_list = "<option selected>--Select Model--</option>";
		while ($result = mysqli_fetch_assoc($result_set) ) {
			$model_list .= "<option value=\"{$result['model']}\" class='info_select'>{$result['model']}</option>";
		}
		echo $model_list;
	}  
	
 	if (isset($_GET['model']) ) {

		$model = mysqli_real_escape_string($connection, $_GET['model']);
		$query 		= "SELECT DISTINCT processor FROM warehouse_information_sheet WHERE model = '{$model}'";
		$result_set = mysqli_query($connection, $query);
        
		$processor_list = "<option selected>--Select Processor--</option>";
		while ($result = mysqli_fetch_assoc($result_set) ) {
			$processor_list .= "<option value=\"{$result['processor']}\" class='info_select'>{$result['processor']}</option>";
		}
		echo $processor_list;
	}  

	if (isset($_GET['processor']) ) {

		$processor = mysqli_real_escape_string($connection, $_GET['processor']);
		$query 		= "SELECT DISTINCT core FROM warehouse_information_sheet WHERE processor = '{$processor}'";
		$result_set = mysqli_query($connection, $query);
        
		$core_list = "<option selected>--Select Core--</option>";
		while ($result = mysqli_fetch_assoc($result_set) ) {
			$core_list .= "<option value=\"{$result['core']}\" class='info_select'>{$result['core']}</option>";
		}
		echo $core_list;
	}  

	if (isset($_GET['core']) ) {

		$core = mysqli_real_escape_string($connection, $_GET['core']);
		$query 		= "SELECT DISTINCT generation FROM warehouse_information_sheet WHERE core = '{$core}'";
		$result_set = mysqli_query($connection, $query);
        
		$generation_list = "<option selected>--Select Core--</option>";
		while ($result = mysqli_fetch_assoc($result_set) ) {
			$generation_list .= "<option value=\"{$result['generation']}\" class='info_select'>{$result['generation']}</option>";
		}
		echo $generation_list;
	}  

	if (isset($_GET['generation']) ) {

		$generation = mysqli_real_escape_string($connection, $_GET['generation']);
		$query 		= "SELECT DISTINCT speed FROM warehouse_information_sheet WHERE generation = '{$generation}'";
		$result_set = mysqli_query($connection, $query);
        
		$speed_list = "<option selected>--Select Speed--</option>";
		while ($result = mysqli_fetch_assoc($result_set) ) {
			$speed_list .= "<option value=\"{$result['speed']}\" class='info_select'>{$result['speed']}</option>";
		}
		echo $speed_list;
	}  

	if (isset($_GET['speed']) ) {

		$speed = mysqli_real_escape_string($connection, $_GET['speed']);
		$query 		= "SELECT DISTINCT lcd_size FROM warehouse_information_sheet WHERE speed = '{$speed}'";
		$result_set = mysqli_query($connection, $query);
        
		$lcd_size_list = "<option selected>--Select LCD Size--</option>";
		while ($result = mysqli_fetch_assoc($result_set) ) {
			$lcd_size_list .= "<option value=\"{$result['lcd_size']}\" class='info_select'>{$result['lcd_size']}</option>";
		}
		echo $lcd_size_list;
	}  
	
	if (isset($_GET['lcd_size']) ) {

		$lcd_size = mysqli_real_escape_string($connection, $_GET['lcd_size']);
		$query 		= "SELECT DISTINCT screen_resolution FROM warehouse_information_sheet WHERE lcd_size = '{$lcd_size}'";
		$result_set = mysqli_query($connection, $query);
        
		$resolution_list = "<option selected>--Select LCD Size--</option>";
		while ($result = mysqli_fetch_assoc($result_set) ) {
			$resolution_list .= "<option value=\"{$result['screen_resolution']}\" class='info_select'>{$result['screen_resolution']}</option>";
		}
		echo $resolution_list;
	}  



?>