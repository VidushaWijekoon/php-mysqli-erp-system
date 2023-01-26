<?php 
	$connection = mysqli_connect("localhost", "root", "", "wms");

	if (isset($_GET['country_name']) ) {
 
		$country_name = mysqli_real_escape_string($connection, $_GET['country_name']);
		 
		$query 		= "SELECT phone_code FROM countries WHERE country_name = '$country_name'";
		$result_set = mysqli_query($connection, $query);
        
		$country_list = "";
		while ($result = mysqli_fetch_assoc($result_set) ) {
			$country_list .= "<option value=\"{$result['phone_code']}\" class='info_select'>{$result['phone_code']}</option>";
		}
		echo $country_list;
	}  

?>