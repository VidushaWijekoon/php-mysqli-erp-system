<?php

include_once('../../dataAccess/403.php');
$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

if($role_id == 1 && $department == 11 || $role_id == 2 && $department == 18 || $role_id == 11 && $department == 20){
    
function filterString($name) {
	return filter_input (INPUT_GET, $name, FILTER_SANITIZE_STRING);
}
function filterInt($name) {
	return filter_input (INPUT_GET, $name, FILTER_SANITIZE_NUMBER_INT);
}
function filterRaw($name) {
	return filter_input (INPUT_GET, $name, FILTER_UNSAFE_RAW);
}

include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>