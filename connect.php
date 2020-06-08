<?php
  
//connect to db 
require('connect/connect.php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//set date zone for India.
date_default_timezone_set('Asia/Kolkata');

if(!(isset($_SESSION['teacher-name']))){
	header('Location: teacherlogin.php');
	die();
}
?>

