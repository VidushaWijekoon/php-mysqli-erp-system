<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'wms';

$connection = mysqli_connect('localhost', 'root', '', 'wms');
$max_filesize = 41943040;
// Checking the connection
if (mysqli_connect_errno()) {
	die('Database connection failed ' . mysqli_connect_error());
}
 
?>