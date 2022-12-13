<?php
	$connection = mysqli_connect("localhost", "root", "", "wms");
	if ( isset($_GET['brand']) ) {
		$name=null;
		$brand = mysqli_real_escape_string($connection, $_GET['brand']);

				if($brand =='HP'){
				$series_list = "<option value='wh3' class='info_select'>WH3</option>";
                }else{
                $series_list = "<option value='wh4' class='info_select'>WH4</option>";
                }
			
		echo $series_list;
	} else {
		echo "<option>Error</option>";
	}
    ?>