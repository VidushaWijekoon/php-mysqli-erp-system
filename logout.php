<?php 

	session_start();

	
 	session_set_cookie_params(0);
	session_destroy();

	// redirecting the user to the login page
	header('Location: index.php?logout=yes');

 ?>