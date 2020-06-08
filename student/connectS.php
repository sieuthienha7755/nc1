<?php
//connect to db 
require('../connect/connect.php');

//start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//set date zone for India.
date_default_timezone_set('Asia/Kolkata');


if(!(isset($_SESSION['id']))){
	header('Location: studentlogin.php');
	die();
}
?>

