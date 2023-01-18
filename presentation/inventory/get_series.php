<?php
	$connection = mysqli_connect("localhost", "root", "", "wms");
	if ( isset($_GET['brand']) ) {
		$name=null;
		$brand = mysqli_real_escape_string($connection, $_GET['brand']);
		$name = $brand."_model";
		$i =0;
		$query 	= "SELECT DISTINCT series FROM `machine_from_supplier` WHERE brand='$brand' ";
		echo $query;

		$result_set = mysqli_query($connection, $query);

		$series_list = "<option selected>--Select series--</option>";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			if($i==0){
				
				$series_list .= "<option value=\"{$result['series']}\" class='info_select'>{$result['series']}</option>";
				$i++;
			}else{
			$series_list .= "<option value=\"{$result['series']}\" class='info_select'>{$result['series']}</option>";
			}
		}
		echo $series_list;
	} else {
		echo "<option>Error</option>";
	}
    ?>