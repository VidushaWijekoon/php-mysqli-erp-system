<?php
	$connection = mysqli_connect("localhost", "root", "", "wms");
	if ( isset($_GET['brand']) ) {
		$name=null;
		$brand = mysqli_real_escape_string($connection, $_GET['brand']);
		$name = $brand."_model";
		$i =0;
		$query 	= "SELECT DISTINCT model FROM `machine_from_supplier` WHERE brand='$brand' ";
		$result_set = mysqli_query($connection, $query);

		$model_list = "<option selected>--Select model--</option>";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			if($i==0){
				
				$model_list .= "<option value=\"{$result['model']}\" class='info_select'>{$result['model']}</option>";
				$i++;
			}else{
			$model_list .= "<option value=\"{$result['model']}\" class='info_select'>{$result['model']}</option>";
			}
		}
		echo $model_list;
	} else {
		echo "<option>Error</option>";
	}
	// if($brand=='hp'){
	// 	$query 	= "SELECT model FROM hp_model ";
	// }elseif($brand=='dell'){
	// 	$query 	= "SELECT model FROM dell_model ";
	// }elseif($brand=='lenovo'){
	// 	$query 	= "SELECT model FROM lenovo_model ";
	// }elseif($brand=='acer'){
	// 	$query 	= "SELECT model FROM acer_model ";
	// }elseif($brand=='asus'){
	// 	$query 	= "SELECT model FROM asus_model ";
	// }elseif($brand=='toshiba'){
	// 	$query 	= "SELECT model FROM toshiba_model ";
	// }elseif($brand=='apple'){
	// 	$query 	= "SELECT model FROM apple_model ";
	// }elseif($brand=='samsung'){
	// 	$query 	= "SELECT model FROM samsung_model ";
	// }elseif($brand=='microsoft'){
	// 	$query 	= "SELECT model FROM microsoft_model ";
	// }elseif($brand=='msi'){
	// 	$query 	= "SELECT model FROM msi_model ";
	// }elseif($brand=='fujitsu'){
	// 	$query 	= "SELECT model FROM fujitsu_model ";
	// }
	
?>