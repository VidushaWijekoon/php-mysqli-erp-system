<?php 

	session_start();

	if (!isset($_SESSION['EXPIRES']) || $_SESSION['EXPIRES'] < time()+60) {
    session_destroy();
    $_SESSION = array();
	}

	$_SESSION['EXPIRES'] = time() + 60;

	$_SESSION = array();

	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-86400, '/');
	}
	
 	session_set_cookie_params(0);
	session_destroy();

	// redirecting the user to the login page
	header('Location: index.php?logout=yes');

 ?>